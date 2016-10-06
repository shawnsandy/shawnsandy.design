<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
});

Route::get('/pages/{name}', function ($name = 'about') {
    
    return view('pages/'.$name);
});

Route::get('/test', function() {
    $file = Storage::disk('posts')->get('Test.md');
    return Markdown::convertToHtml($file);
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/session', function(Request $request){

    $request->session()->put('shawnsandty', 'test session save');
    $request->session()->save();
 return 'Saved';
})->middleware(['web']);
