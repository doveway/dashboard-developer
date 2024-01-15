<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;
use Illuminate\Http\Request;
use App\Http\Requests;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post("/login/check", [UserAuth::class, 'check']);

// Route::get('/portfolioDetail', function () {
//     return view('portfolioDetail');
// });

Route::group(['middleware' => ['protectedPage']],function(){

    Route::get("/home", [UserAuth::class, 'index']);

    Route::get("/addProject", [UserAuth::class, 'addProject']);

    Route::post("/addProjects", [UserAuth::class, 'insertProject']);

    Route::get("/portfolio", [UserAuth::class, 'portfolio']);

    Route::get("/portfolioDetail/{id}", [UserAuth::class, 'portfolioDetail']);

    Route::get("/receivables", [UserAuth::class, 'receivable']);

    Route::get("/uploadSuccessfully", [UserAuth::class, 'uploadSuccessfully']);

    Route::post("/addProjectType", [UserAuth::class, 'insertProjectType']);

    Route::post("/dateFilter", [UserAuth::class, 'dateFilter']);

    Route::post("/unitFilter", [UserAuth::class, 'unitFilter']);

    Route::post("/addProjectTypes", [UserAuth::class, 'insertProjectTypes']);

});


Route::group(['middleware' => ['protectedAccounts']],function(){

    Route::get("/updateProject", [UserAuth::class, 'updateProject']);

    Route::get("/projectPayout", [UserAuth::class, 'projectPayout']);

    Route::post("/addPayouts", [UserAuth::class, 'addPayout']);

});

Route::get("/logout", [UserAuth::class, 'logout']);

// Route::get('/addProject', function () {
//     return view('addProject');
// });