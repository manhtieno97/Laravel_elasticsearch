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
// use App\Post;
// Post::addAllToIndex();
// Route::get('search', function () {
//     $response = \App\Post::searchByQuery([
//         'match' => [
//             'title' => 'est'
//         ]
//     ]);

//     return ($response);
// });
Route::get('search', 'SearchController@index')->name('searchPost');
Route::post('searchPostCreate', 'SearchController@create')->name('searchPostCreate');

