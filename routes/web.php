<?php

use App\Http\Controllers\LocalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
