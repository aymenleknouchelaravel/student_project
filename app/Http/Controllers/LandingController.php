<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    public function welcome()
    {
        if (config('app.coming_soon')) {
            return view('coming_soon');
        }
        $projects = Project::all();
        $users = User::all();
        return view('welcome', compact('projects' , 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
        ]);

        $email = new Email();
        $email->email = $request->email;
        $email->save();

        return redirect('/')->with('success', 'Email sent successfully');
    }
}