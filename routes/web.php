<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


    Route::prefix('employees')->group(function(){
    Route::get("/",[EmployeeController::class, 'index'])->name('employee.index');
    Route::get("/create",[EmployeeController::class, 'create'])->name('employee.create');
    Route::post("/create",[EmployeeController::class, 'store'])->name('employee.store');
    Route::get("/show/{id}",[EmployeeController::class, 'show'])->name('employee.show');
    Route::get("/edit/{id}",[EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post("/update/{id}",[EmployeeController::class, 'update'])->name('employee.update');
    Route::get("/destroy/{id}",[EmployeeController::class, 'destroy'])->name('employee.destroy');

    });
    Route::prefix('department')->group(function(){
    Route::get("/",[DepartmentController::class, 'index'])->name('department.index');
    Route::get("/create",[DepartmentController::class, 'create'])->name('department.create');
    Route::post("/create",[DepartmentController::class, 'store'])->name('department.store');
    Route::get("/show/{id}",[DepartmentController::class, 'show'])->name('department.show');
    Route::get("/edit/{id}",[DepartmentController::class, 'edit'])->name('department.edit');
    Route::post("/update/{id}",[DepartmentController::class, 'update'])->name('department.update');
    Route::get("/destroy/{id}",[DepartmentController::class, 'destroy'])->name('department.destroy');
    });


