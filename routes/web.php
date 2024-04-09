<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\ScheduleLectureController;
use Illuminate\Support\Facades\Route;
use App\Models\Course;

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
    $courses = Course::latest()->take(10)->get();
    return view('dashboard', compact('courses'));
})->name('dashboard');

Route::get('/instructor-schedule-list', [InstructorController::class, 'ViewSchedule'])->name('instructor.view-schedule');

});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->namespace('Admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard1');

        //courses
        Route::get('/add-course', [CourseController::class, 'addCourse'])->name('add-courses');
        Route::post('/submit-course', [CourseController::class, 'storeCourse'])->name('submit-course');
        Route::get('/view-courses',  [CourseController::class, 'viewCourse'])->name('view-course');

        //batches
        Route::get('/add-batch', [CourseController::class, 'addbatch'])->name('add-batch');
        Route::post('/submit-batch', [CourseController::class, 'storeBatch'])->name('submit-batch');
        Route::get('/view-batches',  [CourseController::class, 'viewBatch'])->name('view-batches');

        //Instuctors & lecture Schedule
        Route::get('/instructor-list', [InstructorController::class, 'ViewInstructor'])->name('view-instructor');

        Route::get('/schedule-list', [ScheduleLectureController::class, 'ViewSchedule'])->name('view-schedule');
        Route::get('/add-schedule', [ScheduleLectureController::class, 'addTimetable'])->name('add-schedule');
        Route::post('/submit-schedule', [ScheduleLectureController::class, 'storeTimetable'])->name('submit-schedule');

    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
