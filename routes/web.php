<?php

use App\Http\Controllers\ImageUpload;
use App\Http\Controllers\FetchData;
use App\Http\Controllers\ZipFile;
use App\Http\Controllers\SortData;
use Illuminate\Support\Facades\Route;


Route::get('/', [FetchData::class, 'index']); // Главная страница
Route::get('/uploads', [ImageUpload::class, 'index']); // Страница загрузки
Route::post('/uploadImage', [ImageUpload::class, 'store']); // Страница загрузки изображения
Route::get('/zipImage', [ZipFile::class, 'zipImages']); // Изображение в формате Zip
Route::get("/sort/name", [SortData::class, 'sortName']); // Сортировка изображения по названию
Route::get("/sort/date", [SortData::class, 'sortDate']); // Сортировка изображений по дате
Route::get("/sort/time", [SortData::class, 'sortTime']); // Сортировка изображения по времени
