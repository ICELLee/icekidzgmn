<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CooperationController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\ConceptController;
use App\Http\Controllers\ServerStatusController;
use App\Http\Controllers\ContactController;
use App\Models\TimelineEvent;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/team', [TeamController::class, 'index'])->name('team');
Route::get('/cooperation', [CooperationController::class, 'index'])->name('cooperation');
Route::post('/cooperation/submit', [CooperationController::class, 'submit'])->name('cooperation.submit');
Route::get('/timeline', [TimelineController::class, 'index'])->name('timeline');
route::view('iaoshfd','index')->name('apply');
Route::get('/concept', [ConceptController::class, 'index'])->name('concept');
Route::get('/server-status', [ServerStatusController::class, 'index'])->name('server-status');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::post('/cooperation', [CooperationController::class, 'submit'])->name('cooperation.submit');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(['auth']);
