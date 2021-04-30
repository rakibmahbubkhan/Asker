<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Question;

class FavouritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('favourites')->delete();
        $users = User::pluck('id')->all();
        $numberOfUsers = count($users);
        foreach (Question::all() as $question) {
            for ($i=0; $i < rand(1, $numberOfUsers); $i++) { 
                $user = $users[$i];
                $question->favourites()->attach($user);
            }
        }
    }
}
