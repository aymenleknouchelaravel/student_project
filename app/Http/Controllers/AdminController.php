<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        $users = User::all();
        $projects = Project::all();
        return view('admin.home', compact('users', 'projects'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.allusers', compact('users'));
    }

    public function adduser()
    {
        return view('admin.adduser');
    }

    public function projects()
    {
        $projects = Project::all();
        return view('admin.allprojects', compact('projects'));
    }

    public function addproject()
    {
        $users = User::all();
        return view('admin.addproject', compact('users'));
    }

    public function adduserform(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'client';
        $user->save();
        return redirect()->route("admin.adduser");
    }

    public function addprojectform(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'sf_adresse' => 'required',
            'sf_name' => 'required',
        ]);

        $project = new Project();
        $project->user_id = $request->user_id;
        $project->name = $request->name;
        $project->sf_adresse = $request->sf_adresse;
        $project->sf_name = $request->sf_name;
        $project->save();


        return redirect()->route("admin.addproject");
    }

    public function deleteproject($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route("admin.projects");
    }

    public function deleteuser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route("admin.users");
    }

    public function sendmessageform(Request $request)
    {
        $request->validate([
            'project' => 'required',
            'title' => 'required',
            'text' => 'required',
        ]);

        $message = new Message();
        $message->project_id = $request->project;
        $message->title = $request->title;
        $message->text = $request->text;
        $message->user_id = auth()->user()->id;
        if ($request->file('file') != null) {
            $path = $request->file('file')->store('images', ['disk' => 'public']);
            $message->file = $path;
        }
        $message->save();
        return redirect()->route('admin.message');
    }

    public function message(Request $request)
    {
        $projects = Project::all();
        return view("admin.message", compact('projects'));
    }

}