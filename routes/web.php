<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
    // If user is authenticated it will redirect to HOME, if not it will go to the login page
    if (Auth::check()) {
        return redirect('redirects');
    } else {
        return view('auth.login');
    }
});


/*
|--------------------------------------------------------------------------
| Posts routes
|--------------------------------------------------------------------------
*/
Route::resource('posts', PostController::class);
Route::get('my_posts', [PostController::class, 'myIndex'])->name('my_posts');



/*
|--------------------------------------------------------------------------
| Redirect after login
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
    Route::get('redirects', [HomeController::class, 'index'])->name('redirects');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/
Route::middleware(['admin'])->group(function () {
    Route::get('/admin_dashboard', [AdminController::class, 'index'])->name('admin_dashboard');
});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register user routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "user" middleware group. Now create something great!
|
*/
Route::middleware(['user'])->group(function () {
    Route::get('/user_dashboard', [UserController::class, 'index'])->name('user_dashboard');
});


require __DIR__ . '/auth.php';
