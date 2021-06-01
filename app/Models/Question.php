<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Question extends Model
{
    use HasFactory;
    use VotableTrait;

    protected $fillable = [
            'title',
            'body'
    ];

    protected $appends = [
        'created_date',
        'is_favourited',
        'favourites_count',
        'body_html'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute()
    {
        return route('questions.show', $this->slug);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if ($this->answers_count > 0) {
            if ($this->best_answer_id) {
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }
    
    public function getBodyHtmlAttribute()
    {
        return clean($this->bodyHtml());
    }
    
    public function answers()
    {
        return $this->hasMany(Answer::class)->orderBy('votes_count', 'DESC');
        //$question->answers->count();
        //foreach($question->answers as answer);
    }

    public function acceptBestAnswer(Answer $answer)
    {
        $this->best_answer_id = $answer->id;
        $this->save();
    }

    public function favourites()
    {
        return $this->belongsToMany(User::class, 'favourites')->withTimestamps();      //'question_id', 'user_id'
    }

    public function isFavourited()
    {
        return $this->favourites()->where('user_id', Auth::id())->count() > 0;
    }

    public function getIsFavouritedAttribute()
    {
        return $this->isFavourited();
    }

    public function getFavouritesCountAttribute()
    {
        return $this->favourites->count();
    }

    public function getExcerptAttribute()
    {
        return $this->excerpt(250);
    }

    public function excerpt($length)
    {
        return Str::limit(strip_tags($this->bodyHtml()), $length);
    }

    private function bodyHtml()
    {
        return \Parsedown::instance()->text($this->body);
    }

    
}
