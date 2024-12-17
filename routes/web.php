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

// Route::get('/', function () {
//     return view('welcome');
// });
use App\Http\Controllers\CompetitionController;

Route::get('/', [CompetitionController::class, 'index']);
Route::post('/add-teams', [CompetitionController::class, 'addTeams']);
Route::get('/round/{round}', [CompetitionController::class, 'round']);
Route::post('/select-winners', [CompetitionController::class, 'selectWinners']);
