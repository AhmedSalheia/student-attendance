<?php


use App\Http\Controllers\Admin;
use App\Http\Controllers\Tutor;
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

Route::get('/', function () {
    return to_route('tutor.login');
});

// admin routessdvsdv
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/login', [Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [Admin\AuthController::class, 'login'])->name('login.submit');

    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [Admin\DashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('student', Tutor\StudentsController::class);

        Route::resource('tutors', Admin\TutorsController::class);
        Route::get('/select2-courses', [Admin\Select2Controller::class, 'getCourses']);
        Route::resource('courses', Admin\CourseController::class);
    });
});


Route::prefix('tutor')->as('tutor.')->group(function () {
    Route::get('/login', [Tutor\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [Tutor\AuthController::class, 'login'])->name('login.submit');

    Route::middleware('auth:tutor')->group(function () {
        Route::post('/logout', [Tutor\AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [Tutor\DashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('lecture', Tutor\LectureController::class);
        Route::get('/lectures/{course?}', [Tutor\LectureController::class, 'index'])->name('lecture.index_4_course');
        Route::get('/lecture/create/{id?}', [Tutor\LectureController::class, 'create'])->name('lecture.create_4_course');
        Route::post('/lecture/{id}/upload_file', [Tutor\LectureController::class, 'upload_file'])->name('lecture.upload-file');
        Route::post('/lecture/{id}/attende_student', [Tutor\LectureController::class, 'attende_student'])->name('lecture.attende-student');
        Route::delete('/lecture/{id}/absence_student', [Tutor\LectureController::class, 'absence_student'])->name('lecture.absence-student');
    });
});
