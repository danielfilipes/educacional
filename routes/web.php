<?php

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

Auth::routes();

Route::middleware('auth')->group(function () {  
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resources([
        'user' => 'UserController',
        'semester' => 'SemesterController',
        'course' => 'CourseController',
        'discipline' => 'DisciplineController',
        'curriculum' => 'CurriculumController',
        'student-registration' => 'StudentRegistrationController',
        'discipline-class' => 'DisciplineClassController',
        'class-registration' => 'ClassRegistrationController'
    ]); 
    // Route::get('/user_type', 'UserTypeController@index')->name('user_type');

    //rota para retornar disciplinas de um curso
    Route::get('/disciplines/course/{id_curso}', 'DisciplineController@disciplinesCourse');
});
