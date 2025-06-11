<?php

use App\Http\Controllers\LocalController;
use Illuminate\Support\Facades\Route;

Route::apiResource('locals', LocalController::class);
