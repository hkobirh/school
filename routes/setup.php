<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Setup\ClassController;
use App\Http\Controllers\Backend\Setup\YearController;
use App\Http\Controllers\Backend\Setup\GroupController;
use App\Http\Controllers\Backend\Setup\ShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SubjectController;
use App\Http\Controllers\Backend\Setup\SubjectAssignController;
Route::prefix('setups')->name('setup.')->group(function (){
    //Student class routes
    Route::get('/student/class/view',[ClassController::class,'view'])->name('student.class.view');
    Route::get('/student/class/create',[ClassController::class,'create'])->name('student.class.create');
    Route::post('/student/class/add',[ClassController::class,'store'])->name('student.class.add');
    Route::get('/student/class/edit/{id}',[ClassController::class,'edit'])->name('student.class.edit');
    Route::post('/student/class/edit/{id}',[ClassController::class,'update'])->name('student.class.update');
    Route::get('/student/class/delete/{id}',[ClassController::class,'delete'])->name('student.class.delete');

    //Student year routes
    Route::get('/student/year/view',[YearController::class,'view'])->name('year.view');
    Route::get('/student/year/create',[YearController::class,'create'])->name('year.create');
    Route::post('/student/year/add',[YearController::class,'store'])->name('year.add');
    Route::get('/student/year/edit/{id}',[YearController::class,'edit'])->name('year.edit');
    Route::post('/student/year/edit/{id}',[YearController::class,'update'])->name('year.update');
    Route::get('/student/year/delete/{id}',[YearController::class,'delete'])->name('year.delete');

    //Student Group routes
    Route::get('/student/group/view',[GroupController::class,'view'])->name('student.group.view');
    Route::get('/student/group/create',[GroupController::class,'create'])->name('student.group.create');
    Route::post('/student/group/add',[GroupController::class,'store'])->name('student.group.add');
    Route::get('/student/group/edit/{id}',[GroupController::class,'edit'])->name('student.group.edit');
    Route::post('/student/group/edit/{id}',[GroupController::class,'update'])->name('student.group.update');
    Route::get('/student/group/delete/{id}',[GroupController::class,'delete'])->name('student.group.delete');

    //Student Shift routes
    Route::get('/student/shift/view',[ShiftController::class,'view'])->name('student.shift.view');
    Route::get('/student/shift/create',[ShiftController::class,'create'])->name('student.shift.create');
    Route::post('/student/shift/add',[ShiftController::class,'store'])->name('student.shift.add');
    Route::get('/student/shift/edit/{id}',[ShiftController::class,'edit'])->name('student.shift.edit');
    Route::post('/student/shift/edit/{id}',[ShiftController::class,'update'])->name('student.shift.update');
    Route::get('/student/shift/delete/{id}',[ShiftController::class,'delete'])->name('student.shift.delete');

    //Student Fee category routes
    Route::get('/fee/category/view',[FeeCategoryController::class,'view'])->name('fee.category.view');
    Route::get('/fee/category/create',[FeeCategoryController::class,'create'])->name('fee.category.create');
    Route::post('/fee/category/add',[FeeCategoryController::class,'store'])->name('fee.category.add');
    Route::get('/fee/category/edit/{fee_category_id}',[FeeCategoryController::class,'edit'])->name('fee.category.edit');
    Route::post('/fee/category/edit/{fee_category_id}',[FeeCategoryController::class,'update'])->name('.fee.category.update');
    Route::get('/fee/category/delete/{fee_category_id}',[FeeCategoryController::class,'delete'])->name('fee.category.delete');

    //Student Fee amount routes
    Route::get('/fee/amount/view',[FeeAmountController::class,'view'])->name('fee.amount.view');
    Route::get('/fee/amount/create',[FeeAmountController::class,'create'])->name('fee.amount.create');
    Route::post('/fee/amount/add',[FeeAmountController::class,'store'])->name('fee.amount.add');
    Route::get('/fee/amount/edit/{id}',[FeeAmountController::class,'edit'])->name('fee.amount.edit');
    Route::post('/fee/amount/edit/{fee_category_id}',[FeeAmountController::class,'update'])->name('fee.amount.update');
    Route::get('/fee/amount/details/{fee_category_id}',[FeeAmountController::class,'details'])->name('fee.amount.details');
    Route::get('/fee/amount/delete/{id}',[FeeAmountController::class,'delete'])->name('fee.amount.delete');

    //Student Exam type routes
    Route::get('/exam/type/view',[ExamTypeController::class,'view'])->name('exam.type.view');
    Route::get('/exam/type/create',[ExamTypeController::class,'create'])->name('exam.type.create');
    Route::post('/exam/type/add',[ExamTypeController::class,'store'])->name('exam.type.add');
    Route::get('/exam/type/edit/{id}',[ExamTypeController::class,'edit'])->name('exam.type.edit');
    Route::post('/exam/type/edit/{id}',[ExamTypeController::class,'update'])->name('exam.type.update');
    Route::get('/exam/type/delete/{id}',[ExamTypeController::class,'delete'])->name('exam.type.delete');

    //Student subject routes
    Route::get('/subject/view',[SubjectController::class,'view'])->name('subject.view');
    Route::get('/subject/create',[SubjectController::class,'create'])->name('subject.create');
    Route::post('/subject/add',[SubjectController::class,'store'])->name('subject.add');
    Route::get('/subject/edit/{id}',[SubjectController::class,'edit'])->name('subject.edit');
    Route::post('/subject/edit/{id}',[SubjectController::class,'update'])->name('subject.update');
    Route::get('/subject/delete/{id}',[SubjectController::class,'delete'])->name('subject.delete');

    //Assign subject routes
    Route::get('/assign/subject/view',[SubjectAssignController::class,'view'])->name('subject.assign.view');
    Route::get('/assign/subject/create',[SubjectAssignController::class,'create'])->name('subject.assign.create');
    Route::post('/assign/subject/add',[SubjectAssignController::class,'store'])->name('subject.assign.add');
    Route::get('/assign/subject/edit/{class_id}',[SubjectAssignController::class,'edit'])->name('subject.assign.edit');
    Route::post('/assign/subject/edit/{class_id}',[SubjectAssignController::class,'update'])->name('subject.assign.update');
    Route::get('/assign/subject/delete/{class_id}',[SubjectAssignController::class,'delete'])->name('subject.assign.delete');
    Route::get('/assign/subject/details/{class_id}',[SubjectAssignController::class,'details'])->name('subject.assign.details');
});
