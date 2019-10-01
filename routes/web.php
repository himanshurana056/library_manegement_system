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

Auth::routes();

Route::get('/home', 'HomeController@index');


//students routes coded here:-

Route::resource('students','StudentsController');

// books routes coded here:-

Route::get('/books/deleteBook/{id}','BooksController@deleteBook');
Route::get('/books/editBook/{id}','BooksController@editBook');
Route::post('/books/updateBook','BooksController@updateBook');
Route::resource('books','BooksController');

// departments route coded here:-

Route::get('/departments/deleteDepartment/{id}','DepartmentsController@deleteDepartment');
Route::get('/departments/editDepartment/{id}','DepartmentsController@editDepartment');
Route::post('/departments/updateDepartment','DepartmentsController@updateDepartment');
Route::Resource('departments','DepartmentsController');

//branch route codded here:-

Route::Resource('branches','BranchesController');
Route::get('/branches/editBranch/{id}','BranchesController@editBranch');
Route::post('/branches/updateBranch','BranchesController@updateBranch');

