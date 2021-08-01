<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Read
Route::get('/', [EmployeeController::class, 'index'])->name('pegawai');

//Create
Route::get('/addData', [EmployeeController::class, 'addData'])->name('addData');
Route::post('/insertData', [EmployeeController::class, 'insertData'])->name('insertData');


//Update
Route::get('/update/{id}', [EmployeeController::class, 'viewUpdate'])->name('viewUpdate');
Route::post('/updateData/{id}', [EmployeeController::class, 'updateData'])->name('updateData');


//Delete
Route::get('/delete/{id}', [EmployeeController::class, 'deleteData'])->name('deleteData');
