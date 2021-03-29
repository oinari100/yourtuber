<?php

use Illuminate\Support\Facades\Route;

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

Route::get('selectYoutuber', 'App\Http\Controllers\YoutuberController@selectExisting');

Route::get('registrationYoutuber', 'App\Http\Controllers\YoutuberController@registration');

Route::get('selectResultGenre', 'App\Http\Controllers\GenreController@selectResult');

Route::get('selectResultYoutuber', 'App\Http\Controllers\YoutuberController@selectResult');

Route::get('selectResultAssessment', 'App\Http\Controllers\AssessmentController@selectResult');

Route::get('updateCount', 'App\Http\Controllers\AssessmentController@updateCount');

Route::post('sendMail', 'App\Http\Controllers\MailController@sendMail');

Route::get('resultTweet', 'App\Http\Controllers\TwitterController@tweet');

Route::get('selectRankingAssessment', 'App\Http\Controllers\AssessmentController@selectRanking');

Route::get('selectRankingYoutuber', 'App\Http\Controllers\YoutuberController@selectRanking');

Route::get('selectRankingGenre', 'App\Http\Controllers\GenreController@selectRanking');

Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');