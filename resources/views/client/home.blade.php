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
                                <th>project_adresse</th>
                                <th>contractor_name</th>
                                <th>start_date</th>
                                <th>end_date</th>
                                <th>book_term</th>
                                <th>commercial_reg_date</th>
                                <th>amount</th>
                                <th>commercial_reg_no</th>
                                <th>bank_account_no</th>
                                <th>project_code</th>
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
                                    <td>{{ $project->project_adresse }}</td>
                                    <td>{{ $project->contractor_name }}</td>
                                    <td>{{ $project->start_date }}</td>
                                    <td>{{ $project->end_date }}</td>
                                    <td>{{ $project->book_term }}</td>
                                    <td>{{ $project->commercial_reg_date }}</td>
                                    <td>{{ $project->amount }}</td>
                                    <td>{{ $project->commercial_reg_no }}</td>
                                    <td>{{ $project->bank_account_no }}</td>
                                    <td>{{ $project->project_code }}</td>
                                    <td>
                                        <form class="btn p-0" action="/client/changestate/{{ $project->id }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-inverse-primary btn-icon">
                                                <i class="mdi mdi-power"></i>
                                            </button>
                                        </form>
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
