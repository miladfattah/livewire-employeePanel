<?php

use Illuminate\Support\Facades\Route ;
use App\Http\Livewire\Users\UserIndex ; 
use App\Http\Livewire\Countries\CountryIndex ; 
use App\Http\Livewire\States\StateIndex ; 
use App\Http\Livewire\Cities\CityIndex ; 
use App\Http\Livewire\Departments\DepartmentIndex ; 
use App\Http\Livewire\Employees\EmployeeIndex ; 


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::middleware(['auth:sanctum', 'verified' , 'is_admin'])->group(function(){
    Route::get('/users' , UserIndex::class);
    Route::get('/countries' , CountryIndex::class);
    Route::get('/states' , StateIndex::class);
    Route::get('/cities' , CityIndex::class);
    Route::get('/departments' , DepartmentIndex::class);
    Route::get('/employees' , EmployeeIndex::class);
});