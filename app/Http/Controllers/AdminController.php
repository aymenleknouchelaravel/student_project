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
            'project_adresse' => 'required',
            'contractor_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'book_term' => 'required',
            'commercial_reg_date' => 'required',
            'choice_land' => 'required',
            'amount' => 'required',
            'commercial_reg_no' => 'required',
            'bank_account_no' => 'required',
            'project_code' => 'required',
        ]);

        $project = new Project();
        $project->user_id = $request->user_id;
        $project->name = $request->name;
        $project->sf_adresse = $request->sf_adresse;
        $project->sf_name = $request->sf_name;
        $project->project_adresse = $request->project_adresse;
        $project->contractor_name = $request->contractor_name;
        $project->start_date = $request->start_date;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->book_term = $request->book_term;
        $project->commercial_reg_date = $request->commercial_reg_date;
        $project->choice_land = $request->choice_land;
        $project->amount = $request->amount;
        $project->commercial_reg_no = $request->commercial_reg_no;
        $project->bank_account_no = $request->bank_account_no;
        $project->project_code = $request->project_code;
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
        $messages = auth()->user()->messages;
        $allmessages = Message::all();
        return view("admin.message", compact('projects', 'messages', 'allmessages'));
    }

    public function file($id)
    {
        $file = Message::find($id);
        $file = public_path('storage/' . $file->file);
        if (file_exists($file)) {
            return response()->download($file);
        }

    }

}