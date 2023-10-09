<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home()
    {
        $projects = Project::where('user_id', auth()->user()->id)->get();
        return view('client.home', compact('projects'));    }


}