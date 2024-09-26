<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/', [ HomeController::class, 'index' ])->name('home');

Route::get('/home/{name?}/{age?}', [ HomeController::class, 'index' ])->name('home1');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::redirect('/google', 'https://google.com');

// -- USER ROUTINGS ---// 

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [ UserController::class, 'index'])->name('index');
    Route::get('/{user}', [ UserController::class, 'show'])->name('show');
    Route::get('/{user}/edit', [ UserController::class, 'edit'])->name('edit');
    Route::put('/{user}', [ UserController::class, 'update'])->name('update');
});

// -- PROJECT ROUTINGS --//

Route::resource('project', ProjectController::class);
Route::delete('project',[ ProjectController::class, 'destroyMany' ])->name('project.destroy-many');

// -- ROLE ROUTINGS -- //

Route::resource('role', RoleController::class)->middleware(['auth', 'verified']);

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

require __DIR__.'/auth.php';
