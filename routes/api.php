<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('student-classes', 'API\StudentClassController');
Route::apiResource('subjects', 'API\SubjectController');
Route::apiResource('sections', 'API\SectionController');
Route::apiResource('students', 'API\StudentController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
