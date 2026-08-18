<?php

use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/films');

Route::resource('films', FilmController::class);
