<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/login', [AuthController::class, 'loginUser'] );

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/auth/logout', [AuthController::class, 'logout'] );
    Route::get('/companies/data', [CompanyController::class, 'fetchCompanies'] );
    Route::apiResource('companies', CompanyController::class);
    Route::get('/contacts_by_company/{company_id}', [CompanyController::class, 'contactByCompany'] );
    Route::apiResource('contacts', ContactController::class);
    Route::post('/multiple/contacts', [ContactController::class, 'addMultipleContacts'] );
    Route::get('/search', [CompanyController::class, 'search'] );
    Route::apiResource('notes', NoteController::class);
});

