<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\Orders\OrderController;


Route::get('/characters' , [PageController::class , 'index']);
Route::get('/characters-list', [PageController::class, 'getCharacters']);


Route::get('/search/{toSearch}', [PageController::class, 'search']);
Route::get('/races' , [PageController::class , 'getRaces']);
Route::get('/skills' , [PageController::class , 'getSkills']);
Route::get('/characters-by-race/{race_slug}' , [PageController::class , 'getCharacterByRace']);
Route::get('/characters-by-skill/{skill_slug}' , [PageController::class , 'getCharacterBySkill']);
Route::get('/characters/get-character/{slug}' , [PageController::class , 'getCharacterBySlug']);
Route::post('/send-email', [LeadController::class, 'store']);

Route::get('/orders/generate', [OrderController::class, 'generate']);
Route::post('/orders/make/payment', [OrderController::class, 'makePayment']);

