<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;
use App\Models\Batch;
use App\Models\User;
use App\Models\Schedule;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ], [
            'username.required' => 'Admin Username is Required',
            'password.required' => 'Password is Required',
        ]);



        $username = $credentials['username'];
        $password = $credentials['password'];



        // Attempt to authenticate admin
        if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])) {

            // Admin login successful
            return redirect()->route('dashboard1'); // Replace with your admin dashboard route
        } else {
            // Admin login failed
            return redirect()->back()->withInput()->withErrors(['login_error' => 'Invalid username or password']);
        }
    }

    public function dashboard()
    {
        // Count the total number of courses
        $totalCourses = Course::count();

        // Count the total number of batches
        $totalBatches = Batch::count();

        // Count the total number of schedules
        $totalSchedules = Schedule::count();

        // Count the total number of instructors
        $totalInstructors = User::count(); // Assuming User model is used for instructors

        // Fetch the latest 10 courses
        $courses = Course::latest()->take(10)->get();

        // Pass the counts and courses data to the view
        return view('admin.dashboard', compact('totalCourses', 'totalBatches', 'totalSchedules', 'totalInstructors', 'courses'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login-view'); // Replace with your admin dashboard route
    }

}
