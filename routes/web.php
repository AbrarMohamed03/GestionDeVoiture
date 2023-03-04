<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\VoitureController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//--------------------- Marque Routers  -----------------------------------------
Route::get('/marques', [MarqueController::class, 'ListMarques'])->name('Marque');
Route::get('/addmarque', [MarqueController::class, 'addmarque'])->name('addmarque');
Route::get('/editmarque/{id}', [MarqueController::class, 'editmarque'])->name('editmarque');
Route::get('/deletemarque/{id}', [MarqueController::class, 'deletemarque'])->name('deletemarque');


Route::post('/savemarque', [MarqueController::class, 'savemarque'])->name('savemarque');
Route::post('/updatemarque/{id}', [MarqueController::class, 'updatemarque'])->name('updatemarque');
//------------------------------------------------------------------------------


//--------------------- Modele Routers  -----------------------------------------
Route::get('/modele', [ModeleController::class, 'ListModeles'])->name('modele');
Route::get('/addmodele', [ModeleController::class, 'addmodele'])->name('addmodele');
Route::get('/editmodele/{id}', [ModeleController::class, 'editmodele'])->name('editmodele');
Route::get('/deletemodele/{id}', [ModeleController::class, 'deletemodele'])->name('deletemodele');


Route::post('/savemodele', [ModeleController::class, 'savemodele'])->name('savemodele');
Route::post('/updatemodele/{id}', [ModeleController::class, 'updatemodele'])->name('updatemodele');
//------------------------------------------------------------------------------


//--------------------- Voiture Routers  -----------------------------------------
Route::get('/voiture', [VoitureController::class, 'ListVoiture'])->name('voiture');
Route::get('/addvoiture', [VoitureController::class, 'addvoiture'])->name('addvoiture');
Route::get('/editvoiture/{id}', [VoitureController::class, 'editvoiture'])->name('editvoiture');
Route::get('/deletevoiture/{id}', [VoitureController::class, 'deletevoiture'])->name('deletevoiture');


Route::post('/savevoiture', [VoitureController::class, 'savevoiture'])->name('savevoiture');
Route::post('/updatevoiture/{id}', [VoitureController::class, 'updatevoiture'])->name('updatevoiture');
//------------------------------------------------------------------------------

require __DIR__.'/auth.php';
