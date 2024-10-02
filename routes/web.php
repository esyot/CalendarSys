<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});
// Route for displaying users using the UserController
Route::get('/users', [UserController::class, 'index']);


Route::get('/profile', function () {
    return Inertia::render('Profile'); // Render the Profile component
});
