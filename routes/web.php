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

Route::group(['middleware' => 'guest'], function() {

    Route::get('login', function () {
        return view('auth.login');
    });
    Route::get('/', function () {
        return view('auth/login');
    });
});

Route::group(['middleware' => 'auth'], function() {

    Route::group(['middleware' => 'check.admin'], function() {

    Route::get('/main','EvaluationController@show_for_admin');

        Route::post('/main', 'EvaluationController@show_for_admin_selected');


//      following is for Department
        Route::get('/department','DepartmentController@index');
        Route::get('/add_department',function(){
            return view('admin/department/add_department');
        });
        Route::get('/edit_department/{id}','DepartmentController@show');
        Route::get('/del_department/{id}','DepartmentController@delete');

        Route::post('/adddepartment', 'DepartmentController@store');
        Route::post('/editdepartment', 'DepartmentController@update');

//      following is for Employee
        Route::get('/employees','EmployeeController@index');

        Route::get('/add_employee','EmployeeController@showClassDep');
        Route::get('/edit_employee/{id}','EmployeeController@show');
        Route::get('/del_employee/{id}','EmployeeController@delete');

        Route::post('/editemployee', 'EmployeeController@update');
        Route::post('/addemployee', 'EmployeeController@store');

//      following is for Category
        Route::get('/categories','CategoryController@index');
        Route::get('/copy_create','CategoryController@copy_create');
        Route::get('/add_category',function(){
            return view('admin/category/add_category');
        });
        Route::get('/edit_category/{id}','CategoryController@show');
        Route::get('/del_category/{id}','CategoryController@delete');

        Route::post('/addcategory', 'CategoryController@store');
        Route::post('/editcategory', 'CategoryController@update');

//      following is for Class
        Route::get('/classes','StaffClassController@index');
        Route::get('/add_class',function(){
            return view('admin/class/add_class');
        });
        Route::get('/edit_class/{id}','StaffClassController@show');
        Route::get('/del_class/{id}','StaffClassController@delete');

        Route::post('/addclass', 'StaffClassController@store');
        Route::post('/editclass', 'StaffClassController@update');

    });
    Route::group(['middleware' => 'check.staff'], function() {
//      following is for Staff
        Route::get('/staff','EvaluationController@index');
        Route::get('/staff/detail/{year}','EvaluationController@regist');
        Route::get('/staff/check/{id}','EvaluationController@show');
        Route::get('/staff/evaluation/{id}','EvaluationController@evaluation');
        Route::get('/detail',function(){
            return view('staff/detail');
        });
        Route::post('/addgoal', 'EvaluationController@store');
        Route::post('/evaluation_regist', 'EvaluationController@evaluation_regist');

    });
    Route::group(['middleware' => 'check.boss'], function() {
//      following is for Boss
        Route::get('/boss','EvaluationController@show_for_boss');
        Route::get('/boss/check_boss1/{id}','EvaluationController@check_for_boss1');
        Route::get('/boss/eva_boss1/{id}','EvaluationController@eva_boss1');
        Route::get('/boss/check_boss2/{id}','EvaluationController@check_for_boss2');
        Route::get('/boss/eva_boss2/{id}','EvaluationController@eva_boss2');
        Route::get('/boss/result','EvaluationController@search');
        Route::get('/boss/staff/{id}','EvaluationController@show_staff');

        Route::post('/approval', 'EvaluationController@approval');
        Route::post('/denial', 'EvaluationController@denial');
        Route::post('/evaluation_boss', 'EvaluationController@evaluation_boss');
        Route::post('/boss', 'EvaluationController@show_for_boss_selected');
        Route::post('/search', 'EvaluationController@search');

    });
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
