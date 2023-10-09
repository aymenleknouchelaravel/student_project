@extends('layouts.admin')

@section('title', 'Dashboard | Home')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> My Projects
            </h3>
        </div>
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card table-responsive">
                <div class="card-body">
                    </p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User</th>
                                <th>Project Name</th>
                                <th>Status</th>
                                <th>sf_adresse</th>
                                <th>sf_name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->user->name }} {{ $project->user->surname }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->status }}</td>
                                    <td>{{ $project->sf_adresse }}</td>
                                    <td>{{ $project->sf_name }}</td>
                                    <td>
                                        <form class="btn p-0" action="/admin/deleteproject/{{ $project->id }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-inverse-danger btn-icon">
                                                <i class="mdi mdi-delete-empty"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
