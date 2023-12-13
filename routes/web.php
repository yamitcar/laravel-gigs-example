<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('listings', [
        'heading'  => 'Latest listings',
        'listings' => [
            [
                'id'          => 1,
                'title'       => 'some title',
                'description' => 'some loingaskjdhajksdhakjhsdkjahdkjhd',
            ],
            [
                'id'          => 2,
                'title'       => 'some title 2',
                'description' => 'some loingaskjdhajksdhakjhsdkjahdkjhd',
            ],
        ],
    ]);
});


Route::get('/hello', function () {
    return response('<h1>Hello world</h1>', 200)
        ->header('Content-type', 'text/plain');
});


Route::get('/posts/{id}', function ($id) {
    return response('Post ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function (Request $request) {
    return ($request->hello . ' ' . 'world');

});
