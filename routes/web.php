<?php

use Illuminate\Support\Facades\Route;

use App\Models\Page;

use App\Http\Controllers\HomePageController;

use App\Http\Controllers\ApiTagController;
use App\Http\Controllers\ApiBordController;
use App\Http\Controllers\ApiCardsController;
use App\Http\Controllers\ApiListController;
use App\Http\Controllers\ApiUsersController;
use App\Http\Controllers\ApiTagCardController;
use App\Http\Controllers\ApiBerichtController;
use App\Http\Controllers\ApiWorkspaceController;
use App\Http\Controllers\ApiChecklistController;
use App\Http\Controllers\ApiBerichtCardController;
use App\Http\Controllers\ApiChecklistCardController;
use App\Http\Controllers\ApiUserWorkspaceController;
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
Route::get('/newworkspace', function() {return view('newworkspace');});
Route::get('/newpakket', function() {return view('newpakket');});
Route::get('/loadworkspace/{page}', [ApiWorkspaceController::class, 'LoadUpdate']);
Route::get('/workspaceup/{page}', [ApiWorkspaceController::class, '']);;

Route::get('/newlist/{page}', [ApiListController::class, 'PassId']);
Route::get('/loadlist/{page}', [ApiListController::class, 'LoadUpdate']);


Route::get('/newbord/{page}', [ApiBordController::class, 'PassId']);
Route::get('/loadbord/{page}', [ApiBordController::class, 'LoadUpdate']);
Route::get('/', [ApiWorkspaceController::class, 'ShowAll']);
// Route::get('/workspace/{page}', [ApiBordController::class, 'Show']);
Route::get('/workspace/{page}', [ApiWorkspaceController::class, 'ShowName']);
Route::get('/bord/{page}', [ApiListController::class, 'Show']);
Route::get('/bordNNB/{bord}', [ApiListController::class, 'ShowNNB']);
Route::get('/bordWIP/{bord}', [ApiListController::class, 'ShowWIP']);
Route::get('/bordAF/{bord}', [ApiListController::class, 'ShowAF']);
Route::get('/list/{page}', [ApiListController::class, 'ShowSingle']);