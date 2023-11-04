<?php

use App\Http\Controllers;

//use App\Http\Controllers\Admin\Auth\LogoutController;
//use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\PassedTestsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\FrontNewsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TestsController;
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

Route::group(['middleware' => ['guest']], function () {
    /**
     * Login Routes
     */
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

    /**
     * Register Routes
     */
        Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'show'])->name('register.show');
        Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

});



Route::group(['middleware' => ['auth']], function () {
    /***/
    Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
    /***/
    Route::get('/home', [MainController::class, 'dashboard'])->name('home');


    Route::get('/home', [ MainController::class, 'dashboard'])->name('home');


    Route::get('/profile', [ MainController::class, 'profile'])->name('profile');
    Route::get('/profile/tests', [ MainController::class, 'profileTests'])->name('profile.tests');

    Route::post('/profile-info-update/{id?}', [ MainController::class, 'profileInfoUpdate'])->name('profile.info.update');



    Route::get('/testings', [ TestsController::class, 'index'])->name('testing');
    Route::get('/testings/{id}', [ TestsController::class, 'show'])->name('testing.show');
    Route::post('/testings', [ TestsController::class, 'create'])->name('testing.create');


});


Route::group([
    'prefix' => 'admin',
    'middleware' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin',
], function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('admin.dashboard');
    Route::resource('/users', 'UsersController');
    Route::get('/users/{id}/testing-info', [ UsersController::class, 'testingInfo'])->name('users.testing.info');


    Route::resource('/tests', 'TestsController');
    Route::resource('/tests-categories', 'TestsCategoriesController');

    Route::resource('/news', 'NewsController');
    Route::resource('/news-categories', 'NewsCategoriesController');
    Route::get('/passed-testings', [ PassedTestsController::class, 'index'])->name('passed.testings');
    Route::get('/passed-testings/{id}', [ PassedTestsController::class, 'show'])->name('passed.testings.show');
});


//Route::view('/', 'frontend/pages/home.index')->name('index');
//
//Route::view('/modal', 'frontend/pages/tasks.modal')->name('modal');
//Route::view('/category', 'frontend/pages/news.category')->name('category');
//Route::view('/single', 'frontend/pages/news.single')->name('single');
//Route::view('/all-category', 'frontend/pages/news.index')->name('all-category');



Route::get('/', [App\Http\Controllers\FrontNewsController::class, 'newsMain'])->name('newsMain');

Route::get('/news/category/{id}', [App\Http\Controllers\FrontNewsController::class, 'newsCategory'])
    ->name('news.category');
Route::get('/post/{id}', [App\Http\Controllers\FrontNewsController::class, 'newsPost'])
    ->name('news.post');


Route::get('/meditation', [FrontNewsController::class, 'meditation'])->name('meditation');
Route::get('/meditation/{id}', [FrontNewsController::class, 'meditationPost'])->name('meditation.post');

Route::get('/study-block', [FrontNewsController::class, 'studyBlock'])->name('studyBlock');
Route::get('/study-block/{id}', [FrontNewsController::class, 'studyBlockPost'])->name('studyBlock.post');



Route::get('/training-games', [MainController::class, 'trainingGames'])->name('games');
Route::get('/motivation', [MainController::class, 'motivation'])->name('motivation');
Route::get('/about-us', [MainController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contacts', [ MainController::class, 'contacts'])->name('contacts');
