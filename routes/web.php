<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return redirect('/events');
});
Route::get('/register', function () {
     return view('pages.auth.register');
});

// Route::get('/home', function () {
//     return view('pages.home');
// });
Route::view('/home', 'pages.home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::delete('events/{event}/users/{id}', [EventController::class, 'deleteUser']);
Route::get('events', [EventController::class, 'index']);
Route::resource('events', EventController::class)->only([
    'create', 'store', 'show'
])->middleware('auth');

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/analytics', [AnalyticsController::class, 'analytics']);
require __DIR__.'/auth.php';