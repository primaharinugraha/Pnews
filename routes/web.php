<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LandingpageController;
use Symfony\Component\Routing\Attribute\Route as AttributeRoute;

Route::get('/', [LandingpageController::class, 'index'])->name('landingpage');
Route::get('/{slug}', [NewsController::class, 'category'])->name('newscategory');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('newsshow');
Route::get('/author/{ussername}', [AuthorController::class, 'show'])->name('authorshow');




