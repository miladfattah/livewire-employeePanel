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
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::middleware(['auth:sanctum', 'verified' , 'is_admin'])->group(function(){
    Route::get('/users' , UserIndex::class)->name('users.index');
    Route::get('/countries' , CountryIndex::class)->name('countries.index');
    Route::get('/states' , StateIndex::class)->name('states.index');
    Route::get('/cities' , CityIndex::class)->name('cities.index');
    Route::get('/departments' , DepartmentIndex::class)->name('departments.index');
    Route::get('/employees' , EmployeeIndex::class)->name('employees.index');
});