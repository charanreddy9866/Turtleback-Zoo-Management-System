<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BusinessAdsController;
use App\Http\Controllers\ClubsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WholesalerController;

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


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');


Route::get('/',  [PagesController::class, 'index']);
Route::get('/index',  [PagesController::class, 'index']);


/* AssetManagementController */

Route::get('/asset',  [AssetController::class, 'index']);
Route::get('/animals',  [AssetController::class, 'animals']);
Route::get('/employees',  [AssetController::class, 'employees']);
Route::get('/buildings',  [AssetController::class, 'buildings']);
Route::get('/rates',  [AssetController::class, 'rates']);

##employee
Route::get('/asset/addemployees', [AssetController::class, 'addemployees'])->name('asset.addemployees');
Route::post('/asset/addemployees', [AssetController::class, 'storeemployee'])->name('asset.addemployees');
Route::get('/asset/{id}/editemployee', [AssetController::class, 'editemployee'])->name('asset.editemployee');
Route::post('/asset/{id}/editemployee', [AssetController::class, 'updateemployee'])->name('asset.editemployee');
Route::delete('/asset/{id}', [AssetController::class, 'destroyemployee'])->name('asset.destroyemployee');

##attractions
Route::get('/attractions',  [AssetController::class, 'attractions']);
Route::get('/zooattractions',  [AssetController::class, 'zooattractions']);
Route::get('/attractions/addattractions', [AssetController::class, 'addattractions'])->name('attractions.addattractions');
Route::post('/attractions/addattractions', [AssetController::class, 'storeattraction'])->name('attractions.addattractions');
Route::get('/attractions/{id}/editattraction', [AssetController::class, 'editattraction'])->name('attractions.editattraction');
Route::post('/attractions/{id}/editattraction', [AssetController::class, 'updateattraction'])->name('attractions.editattraction');
Route::delete('/attractions/{id}', [AssetController::class, 'destroyattraction'])->name('attractions.destroyattraction');

/* animals */

Route::get('/animals',  [AssetController::class, 'animals']);
Route::get('/animals/addanimals', [AssetController::class, 'addanimals'])->name('animals.addanimals');
Route::post('/animals/addanimals', [AssetController::class, 'storeanimal'])->name('animals.addanimals');
Route::get('/animals/{id}/editanimal', [AssetController::class, 'editanimal'])->name('animals.editanimal');
Route::post('/animals/{id}/editanimal', [AssetController::class, 'updateanimal'])->name('animals.editanimal');
Route::delete('/animals/{id}', [AssetController::class, 'destroyanimal'])->name('animals.destroyanimal');

/* buildings*/

Route::get('/buildings',  [AssetController::class, 'buildings']);
Route::get('/buildings/addbuildings', [AssetController::class, 'addbuildings'])->name('buildings.addbuildings');
Route::post('/buildings/addbuildings', [AssetController::class, 'storebuilding'])->name('buildings.addbuildings');
Route::get('/buildings/{id}/editbuilding', [AssetController::class, 'editbuilding'])->name('buildings.editbuilding');
Route::post('/buildings/{id}/editbuilding', [AssetController::class, 'updatebuilding'])->name('buildings.editbuilding');
Route::delete('/buildings/{id}', [AssetController::class, 'destroybuilding'])->name('buildings.destroybuilding');

/* wages*/

Route::get('/wages',  [AssetController::class, 'wages']);
Route::get('/wages/addwages', [AssetController::class, 'addwages'])->name('wages.addwages');
Route::post('/wages/addwages', [AssetController::class, 'storewage'])->name('wages.addwages');
Route::get('/wages/{id}/editwage', [AssetController::class, 'editwage'])->name('wages.editwage');
Route::post('/wages/{id}/editwage', [AssetController::class, 'updatewage'])->name('wages.editwage');
Route::delete('/wages/{id}', [AssetController::class, 'destroywage'])->name('wages.destroywage');
/* activity management */
Route::get('/activity',  [ActivityController::class, 'index']);



/* concessions */

Route::get('/concessions',  [ActivityController::class, 'concessions']);
Route::get('/concessions/addconcessions', [ActivityController::class, 'addconcessions'])->name('concessions.addconcessions');
Route::post('/concessions/addconcessions', [ActivityController::class, 'storeconcession'])->name('concessions.addconcessions');
Route::get('/concessions/{id}/editconcession', [ActivityController::class, 'editconcession'])->name('concessions.editconcession');
Route::post('/concessions/{id}/editconcession', [ActivityController::class, 'updateconcession'])->name('concessions.editconcession');
Route::delete('/concessions/{id}', [ActivityController::class, 'destroyconcession'])->name('concessions.destroyconcession');

/* attendance */

Route::get('/attendance',  [ActivityController::class, 'attendance']);
Route::get('/attendance/addattendance', [ActivityController::class, 'addattendance'])->name('attendance.addattendance');
Route::post('/attendance/addattendance', [ActivityController::class, 'storeattendance'])->name('attendance.addattendance');
Route::get('/attendance/{id}/editattendance', [ActivityController::class, 'editattendance'])->name('attendance.editattendance');
Route::post('/attendance/{id}/editattendance', [ActivityController::class, 'updateattendance'])->name('attendance.editattendance');
Route::delete('/attendance/{id}', [ActivityController::class, 'destroyattendance'])->name('attendance.destroyattendance');


/* attractions */

Route::get('/zooattractions',  [ActivityController::class, 'zooattractions']);
Route::get('/zooattractions/addattractions', [ActivityController::class, 'addattractions'])->name('attractions.addattractions');
Route::post('/zooattractions/addattractions', [ActivityController::class, 'storeattraction'])->name('attractions.addattractions');
Route::get('/zooattractions/{id}/editattraction', [ActivityController::class, 'editattraction'])->name('attractions.editattraction');
Route::post('/zooattractions/{id}/editattraction', [ActivityController::class, 'updateattraction'])->name('attractions.editattraction');
Route::delete('/zooattractions/{id}', [ActivityController::class, 'destroyattraction'])->name('attractions.destroyattraction');

/* management & reporting */
Route::get('/management',  [ManagementController::class, 'index']);

Auth::routes();

