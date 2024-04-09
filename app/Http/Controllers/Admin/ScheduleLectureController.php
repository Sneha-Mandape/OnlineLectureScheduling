<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Batch;
use App\Models\User;
use App\Models\Schedule;

class ScheduleLectureController extends Controller
{
    public function addTimetable(){
        $courses = Course::all();
        $batches = Batch::all();
        $instructors = User::all();
        return view('admin.add-schedule', compact('courses', 'batches', 'instructors'));
    }

    public function storeTimetable(Request $request){
        // Validate the form data
    $validatedData = $request->validate([
        'course' => 'required',
        'batch' => 'required',
        'instructor' => 'required',
        'date' => 'required|date',
    ]);

    // Check if there is any existing schedule for the selected instructor on the chosen date
    $existingScheduleForInstructor = Schedule::where('instructor_id', $validatedData['instructor'])
                                             ->where('date', $validatedData['date'])
                                             ->first();

    if ($existingScheduleForInstructor) {
        return back()->withInput()->withErrors(['date' => 'The selected instructor already has a schedule on this date.']);
    }

    // Check if there is any existing schedule for the selected course, batch, and date
    $existingScheduleForCourseBatchDate = Schedule::where('course_id', $validatedData['course'])
                                                   ->where('batch_id', $validatedData['batch'])
                                                   ->where('date', $validatedData['date'])
                                                   ->first();

    if ($existingScheduleForCourseBatchDate) {
        return back()->withInput()->withErrors(['date' => 'lecture is already scheduled for this course and batch on this date.']);
    }

    // If no existing schedules, create and save the new schedule
    Schedule::create([
        'course_id' => $validatedData['course'],
        'batch_id' => $validatedData['batch'],
        'instructor_id' => $validatedData['instructor'],
        'date' => $validatedData['date'],
    ]);

    return redirect()->back()->with('success', 'Schedule added successfully.');
    }

    public function ViewSchedule(){
        $schedules = Schedule::with('instructor')->get();
        return view('admin.view-schedule', compact('schedules'));
    }
}
