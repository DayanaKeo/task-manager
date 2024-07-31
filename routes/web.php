<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
    return view('welcome');
 });

// Route::get('/tasks', TaskController::class, 'index');
Route::get('/tasks', function () {
    return view('tasks.index');
});

Route::get('/generate-pdf', function () {
    $output = shell_exec('python3 python/scripts/structure_to_pdf.py');
    return response()->download(public_path('Laravel_Project_Structure.pdf'));
});