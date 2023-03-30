<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/', function () {
    return view('home');
});


Route::get('/home', function () {
    return view('home');
});


Route::get('/dashboard', function () {
    if (Auth::check()) {
        return view('dashboard');
    } else{
        return view('home');
    }
});

Route::get('/movie-search', function () {
    return view('movie-search');
})->name('movie.search.page');

Route::post('/movie-search', function (Request $request){
    $query = $request->input('query');
    $movies = \App\Models\Movie::where('title', 'like', '%'.$query.'%')->get();

    return view('movie-search', compact('movies'));
})->name('movies.search.action');

Route::get('/movie-page/{movieId}', [\App\Http\Controllers\ControllerMoviePage::class, 'page'])->name('movie.page.page');

//Route::get('/movie-page', [\App\Http\Controllers\ControllerMoviePage::class, 'page'])->name('movie.page.page');











