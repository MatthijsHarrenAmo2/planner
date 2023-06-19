<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Tag_Cards;
use App\Models\Users_Workspaces;
use App\Models\Checklist_Cards;
use App\Models\Bericht_Cards;

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
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/users', [ApiUsersController::class, 'ShowAll']);
Route::get('/users/{users}', [ApiUsersController::class, 'Show']);
Route::post('/users', [ApiUsersController::class, 'Store']);
Route::put('/users/{users}', [ApiUsersController::class, 'Update']);
Route::delete('/users/{users}', [ApiUsersController::class, 'Delete']);


Route::get('/workspace', [ApiWorkspaceController::class, 'Show']);
Route::get('/workspace/{workspace}', [ApiWorkspaceController::class, 'Show']);
Route::post('/workspace', [ApiWorkspaceController::class, 'Store']);
Route::put('/updateworkspace/{workspace}', [ApiWorkspaceController::class, 'Update']); 
Route::get('/workspaceup/{workspace}', [ApiWorkspaceController::class, 'workspaceUp']);
Route::get('/workspacedown/{workspace}', [ApiWorkspaceController::class, 'workspaceDown']);
Route::delete('/workspace/{workspace}', [ApiWorkspaceController::class, 'Delete']);

Route::get('/bord', [ApiBordController::class, 'ShowAll']);
Route::get('/bord/{bord}', [ApiBordController::class, 'Show']);
Route::post('/bord', [ApiBordController::class, 'Store']);
Route::put('/updatebord/{bord}', [ApiBordController::class, 'Update']);
Route::get('/bordup/{bord}', [ApiBordController::class, 'bordUp']);
Route::get('/borddown/{bord}', [ApiBordController::class, 'bordDown']);
Route::delete('/bord/{bord}', [ApiBordController::class, 'Delete']);

Route::get('/list', [ApiListController::class, 'ShowAll']);
Route::get('/list/{list}', [ApiListController::class, 'Show']);
Route::post('/list', [ApiListController::class, 'Store']);
Route::put('/updatelist/{list}', [ApiListController::class, 'Update']);
Route::get('/listup/{list}', [ApiListController::class, 'listUp']);
Route::get('/listdown/{list}', [ApiListController::class, 'ListDown']);
Route::delete('/list/{list}', [ApiListController::class, 'Delete']);

Route::get('/card', [ApiCardsController::class, 'ShowAll']);
Route::get('/card/{card}', [ApiCardsController::class, 'Show']);
Route::post('/card', [ApiCardsController::class, 'Store']); 
Route::put('/card/{card}', [ApiCardsController::class, 'Update']);
Route::delete('/card/{card}', [ApiCardsController::class, 'Delete']);

Route::get('/tag', [ApiTagController::class, 'ShowAll']);
Route::get('/tag/{tag}', [ApiTagController::class, 'Show']);
Route::post('/tag', [ApiTagController::class, 'Store']);
Route::put('/tag/{tag}', [ApiTagController::class, 'Update']);
Route::delete('/tag/{tag}', [ApiTagController::class, 'Delete']);

Route::get('/checklist', [ApiChecklistController::class, 'ShowAll']);
Route::get('/checklist/{checklist}', [ApiChecklistController::class, 'Show']);
Route::post('/checklist', [ApiChecklistController::class, 'Store']);
Route::put('/checklist/{checklist}', [ApiChecklistController::class, 'Update']);
Route::delete('/checklist/{checklist}', [ApiChecklistController::class, 'Delete']);

Route::get('/bericht', [ApiBerichtController::class, 'ShowAll']);
Route::get('/bericht/{bericht}', [ApiBerichtController::class, 'Show']);
Route::post('/bericht', [ApiBerichtController::class, 'Store']);
Route::put('/bericht/{bericht}', [ApiBerichtController::class, 'Update']);
Route::delete('/bericht/{bericht}', [ApiBerichtController::class, 'Delete']);




Route::get('/userworkspace', [ApiUserWorkspaceController::class, 'ShowAll']);
Route::get('/userworkspace/{userworkspace}', [ApiUserWorkspaceController::class, 'Show']);
Route::post('/userworkspace', [ApiUserWorkspaceController::class, 'Store']);
Route::put('/userworkspace/{userworkspace}', [ApiUserWorkspaceController::class, 'Update']);
Route::delete('/userworkspace/{userworkspace}', [ApiUserWorkspaceController::class, 'Delete']);


Route::get('/checklistcard', [ApiChecklistCardController::class, 'ShowAll']);
Route::get('/checklistcard/{checklistcard}', [ApiChecklistCardController::class, 'Show']);
Route::post('/checklistcard', [ApiChecklistCardController::class, 'Store']);
Route::put('/checklistcard/{checklistcard}', [ApiChecklistCardController::class, 'Update']);
Route::delete('/checklistcard/{checklistcard}', [ApiChecklistCardController::class, 'Delete']);


Route::get('/berichtcard', [ApiBerichtCardController::class, 'ShowAll']);
Route::get('/berichtcard/{berichtcard}', [ApiBerichtCardController::class, 'Show']);
Route::post('/berichtcard', [ApiBerichtCardController::class, 'Store']);
Route::put('/berichtcard/{berichtcard}', [ApiBerichtCardController::class, 'Update']);
Route::delete('/berichtcard/{berichtcard}', [ApiBerichtCardController::class, 'Delete']);


Route::get('/tagcard', [ApiTagCardController::class, 'ShowAll']);
Route::get('/tagcard/{tagcard}', [ApiTagCardController::class, 'Show']);
Route::post('/tagcard', [ApiTagCardController::class, 'Store']);
Route::put('/tagcard/{tagcard}', [ApiTagCardController::class, 'Update']);
Route::delete('/tagcard/{tagcard}', [ApiTagCardController::class, 'Delete']);
