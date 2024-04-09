<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schedule;

class InstructorController extends Controller
{
    public function ViewInstructor(){
        $instructors= User::all();
        return view ('admin.instructor-list', compact('instructors'));
    }


    public function ViewSchedule(){
        $user = auth()->user();

        // Check if the user's ID exists in the schedules table's instructor_id column
        $schedules = Schedule::where('instructor_id', $user->id)->get();
        return view('view-schedule', compact('schedules'));
    }
}
