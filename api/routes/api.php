<?php

use App\Http\Controllers\SubservicePageController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/main', [\App\Http\Controllers\MainPageController::class, 'index']);
Route::post('/main', [\App\Http\Controllers\FormController::class, 'giveConsultation']);

Route::get('/service/{id}', [\App\Http\Controllers\ServicePageController::class, 'index']);
Route::post('/service/{id}/price', [\App\Http\Controllers\FormController::class, 'submitPrice']);
Route::post('/service/{id}/question', [\App\Http\Controllers\FormController::class, 'getQuestion']);
Route::get('/subservice/{id}', [SubservicePageController::class, 'getOne']);
Route::post('/subservice/{id}/price', [\App\Http\Controllers\FormController::class, 'submitPrice']);
Route::post('/subservice/{id}/question', [\App\Http\Controllers\FormController::class, 'getQuestion']);

Route::get('/about', [\App\Http\Controllers\AboutPageController::class, 'index']);

Route::get('/feedback', [\App\Http\Controllers\FeedbackPageController::class, 'index']);
Route::post('/feedback', [\App\Http\Controllers\FormController::class, 'getFeedback']);

Route::get('/vacancy', [\App\Http\Controllers\VacancyPageController::class, 'index']);
Route::post('/vacancy', [\App\Http\Controllers\FormController::class, 'getSummary']);

Route::get('/article', [\App\Http\Controllers\ArticlePageController::class, 'index']);

Route::get('/article/{id}', [\App\Http\Controllers\ArticlePageController::class, 'getOne']);

Route::get('/project', [\App\Http\Controllers\ProjectPageController::class, 'index']);

Route::get('/project/{id}', [\App\Http\Controllers\ProjectPageController::class, 'getOne']);

Route::get('/price', [\App\Http\Controllers\PricePageController::class, 'index']);

Route::get('/faq', [\App\Http\Controllers\FAQPageController::class, 'index']);
Route::post('/faq', [\App\Http\Controllers\FormController::class, 'getQuestion']);

Route::post('/search', [\App\Http\Controllers\SearchController::class,'search']);

Route::get('/menu', [\App\Http\Controllers\MenuController::class,'index']);
