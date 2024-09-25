<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/home/{name?}/{age?}', [ HomeController::class, 'index' ])->name('home');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::redirect('/google', 'https://google.com');

// -- USER ROUTINGS ---// 

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [ UserController::class, 'index'])->name('index');
    Route::get('/{user}', [ UserController::class, 'show'])->name('show');
});

// -- PROJECT ROUTINGS --//

Route::resource('project', ProjectController::class);





// Route::get('/home/{name}', function($name){

//     // $age = 11;
//     // $gender = 'female';

//     return view('home', compact( 'name' ) );
//     // return view('home', [ 'name' => $name, 'age' => $age, 'gender' => $gender ] );
// });

// Route::get('/home/{name}/{age}', function($name, $age){

//     // $age = 11;
//     // $gender = 'female';

//     return view('home', compact( 'name', 'age' ) );
//     // return view('home', [ 'name' => $name, 'age' => $age, 'gender' => $gender ] );
// });


// Route::get('/home', function(){
//     return view('home');
// });