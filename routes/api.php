<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiStudentController;

Route::get('/user', function (Request $request) {
    return $request->user();

})->middleware('auth:sanctum');

Route::get('/', function () {
    return 'API v1 Welcome Page!. Contact Administrator for more info.';
});

Route::get('/student', [ApiStudentController::class, "index"]);