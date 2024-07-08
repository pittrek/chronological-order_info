<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TvshowController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('showimage/{id}', [MovieController::class, 'showImage'])->name('showimage');
Route::get('showtvshowimage/{id}', [TvshowController::class, 'showImage'])->name('showtvshowimage');
Route::get('movies/list', [MovieController::class, 'list'])->name('movies_list');
Route::resource('movies', MovieController::class)->middleware(['auth', 'verified']);
Route::get('tvshows/list', [TvshowController::class, 'list'])->name('tvshows_list');
Route::resource('tvshows', TvshowController::class)->middleware(['auth', 'verified']);
Route::get('seasons/list', [SeasonController::class, 'list'])->name('seasons_list');
Route::resource('seasons', SeasonController::class)->middleware(['auth', 'verified']);
Route::get('episodes/list', [EpisodeController::class, 'list'])->name('episodes_list');
Route::resource('episodes', EpisodeController::class)->middleware(['auth', 'verified']);
Route::get('stories/list', [StoryController::class, 'list'])->name('stories_list');
Route::get('stories/list/franchise/{franchise}', [StoryController::class, 'listFranchise'])->name('stories.listFranchise');
Route::resource('stories', StoryController::class)->middleware(['auth', 'verified']);
Route::get('franchises/list', [FranchiseController::class, 'list'])->name('franchises_list');
Route::resource('franchises', FranchiseController::class)->middleware(['auth', 'verified']);

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
