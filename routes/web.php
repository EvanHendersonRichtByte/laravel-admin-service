<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/test", "Test@first");
Route::get('/registration', "Test@form");

Route::post('/send', "Test@send");
Route::get('/student', "Student@get_student");
Route::post('/save_student', "Student@save");
Route::get('/delete_student/{nis}',"Student@delete");

Route::get("/employee","employee@index");
Route::post("/save_employee","employee@save");
Route::get("/delete_employee/{id_karyawan}","employee@delete");

Route::get("/customer","customer@index");
Route::post("/save_customer","customer@save");
Route::get("/delete_customer/{id_pelanggan}","customer@delete");

Route::get("/service","service@index");
Route::post("/save_service","service@save");
Route::get("/delete_service/{id_layanan}","service@delete");

Route::get("/login","Login@index");
Route::post("/check_login","Login@check");
Route::get("/logout","Login@check");

Route::get("/loginp","Login@index");
Route::post("/check_login","Login@check");
Route::get("/logout","Login@check");

Route::get("/transaction","Transaction@index");
Route::post('/save_transaction',"Transaction@save");
Route::get('/report',"Transaction@report");

Route::post("service/search","service@search");	