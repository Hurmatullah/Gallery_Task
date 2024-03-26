<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FetchImg;
use App\Http\Controllers\Api\FilterImg;


Route::get("/fetchImg", [FetchImg::class, 'index']); // Извлечение изображения
Route::get('/filterImg/{id}', [FilterImg::class, 'filterImg']); // Отфильтровать изображение по id
