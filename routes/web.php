<?php

use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CandidateController::class, 'index'])->name('home');

Route::get('/create', [CandidateController::class, 'create'])->name('candidate.create');

Route::post('/', [CandidateController::class, 'store'])->name('candidate.store');
