@extends('layouts.admin')

@section('title', 'Dashboard | Message')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Send Message
            </h3>
        </div>
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('shared.errors')
                    <form action="/admin/sendmessageform" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInput4" class="col-sm-3 col-form-label">Select Project</label>
                            <div class="col-sm-9">
                                <select name="project" class="form-control form-control-sm" id="exampleInput4">
                                    @foreach ($projects as $project)
                                        <option value={{ $project->id }}>{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput1" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" id="exampleInput1"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput2" class="col-sm-3 col-form-label">Text</label>
                            <div class="col-sm-9">
                                <input name="text" type="text" class="form-control" id="exampleInput2"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput5" class="col-sm-3 col-form-label">File</label>
                            <div class="col-sm-9">
                                <input name="file" type="file" class="form-control" id="exampleInput5"
                                    placeholder=".........">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Send</button>
                        <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                Send By Me
                @foreach (auth()->user()->messages as $message)
                    <div class="card mt-2">
                        <div class="card-body">
                            <h4>{{ $message->project->name }}</h4>
                            <h2 class="card-subtitle mb-2 text-muted">{{ $message->title }}</h2>
                            <p class="card-text">{{ $message->text }}</p>
                            @if ($message->file != null)
                                <a class="btn btn-success" href='/admin/file/{{ $message->id }}'>Download File</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6">
                Received
                @foreach ($allmessages as $message)
                    @if ($message->user->role == 'client')
                        <div class="card mt-2">
                            <div class="card-body">
                                <h5 class="card-title">{{ $message->user->name }}</h5>
                                <h3>{{ $message->project->name }}</h3>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $message->title }}</h6>
                                <p class="card-text">{{ $message->text }}</p>
                                @if ($message->file != null)
                                    <a class="btn btn-success" href='/admin/file/{{ $message->id }}'>Download File</a>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
