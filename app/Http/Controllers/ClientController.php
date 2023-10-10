<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Project;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home()
    {
        $projects = Project::where('user_id', auth()->user()->id)->get();
        return view('client.home', compact('projects'));
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
        return redirect()->route('client.message');
    }

    public function message(Request $request)
    {
        $messagesInProjects = [];

        $allmessages = Message::all();
        $projects = auth()->user()->projects;
        $messages = Message::all();
        foreach ($allmessages as $message) {
            foreach ($projects as $project) {
                if ($message->project_id == $project->id) {
                    $messagesInProjects[] = $message;
                }
            }
        }
        return view("client.message", compact('projects', 'messagesInProjects'));
    }


}