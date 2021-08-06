<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Student\StudentRegController;

Route::prefix('students')->name('student.')->group(function (){
    //Registration routes
    Route::get('/reg/view',[StudentRegController::class,'view'])->name('registration.view');
    Route::get('/reg/create',[StudentRegController::class,'create'])->name('registration.create');
    Route::post('/reg/add',[StudentRegController::class,'store'])->name('registration.add');
    Route::get('/reg/edit/{id}',[StudentRegController::class,'edit'])->name('registration.edit');
    Route::post('/reg/edit/{id}',[StudentRegController::class,'update'])->name('registration.update');
    Route::get('/reg/delete/{id}',[StudentRegController::class,'delete'])->name('registration.delete');
    Route::get('/year_class_wise',[StudentRegController::class,'yearClassWise'])->name('year.class.wise');

});
