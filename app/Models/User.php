<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rules\Exists;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $appends = [
        'url',
        'avater'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function getUrlAttribute(){
        // return route('questions.show', $this->id);
        return '#';
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getAvaterAttribute()
    {
        $name = $this->name;
        $size = 32;
        $background='0f74b4';
        $color='e3ffff';


        return "https://ui-avatars.com/api/?name=".$name."&"."size=".$size."&"."background=".$background."&"."color=".$color;
    }

    public function favourites()
    {
        return $this->belongsToMany(Question::class,'favourites')->withTimestamps();      //'user_id', 'question_id'
    }

    public function voteQuestions()
    {
        return $this->morphedByMany(Question::class, 'votable');
    }

    public function voteAnswers()
    {
        return $this->morphedByMany(Answer::class, 'votable');
    }

    public function voteQuestion(Question $question, $vote)
    {
        $voteQuestions = $this->voteQuestions();

        return $this->_vote($voteQuestions, $question, $vote);
    }

    public function voteAnswer(Answer $answer, $vote)
    {
        $voteAnswers = $this->voteAnswers();

        return $this->_vote($voteAnswers, $answer, $vote);

        
    }

    private function _vote($ralationship, $model, $vote)
    {
        if ($ralationship->where('votable_id', $model->id)->exists()) {
            $ralationship->updateExistingPivot($model, ['vote' => $vote]);
        }
        else {
            $ralationship->attach($model, ['vote' => $vote]);
        }

        $model->load('votes');
        $downVotes = (int) $model->downVotes()->sum('vote');
        $upVotes = (int) $model->upVotes()->sum('vote');
        
        $model->votes_count = $upVotes + $downVotes;
        $model->save();

        return $model->votes_count;
    }

}
