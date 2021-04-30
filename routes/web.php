<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\AcceptAnswerController;
use App\Http\Controllers\FavouritesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('questions',QuestionsController::class)->except('show');
// Route::post('/questions/{question}/answers', [AnswersController::class, 'store'])->name('answers.store');
Route::resource('questions.answers',AnswersController::class)->except(['index', 'create', 'show']);

Route::get('/questions/{slug}', [QuestionsController::class, 'show'])->name('questions.show');
Route::post('/answers/{answer}/accept', AcceptAnswerController::class)->name('answers.accept');
Route::post('/questions/{question}/favourites', [FavouritesController::class, 'store'])->name('questions.favourite');
Route::post('/questions/{question}/favourites', [FavouritesController::class, 'destroy'])->name('questions.unfavourite');