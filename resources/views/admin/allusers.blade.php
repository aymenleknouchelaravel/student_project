@extends('layouts.admin')

@section('title', 'Dashboard | All Users')


@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> All Users
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
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form class="btn p-0" action="/admin/deleteuser/{{ $user->id }}" method="post">
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

@section('content')
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card table-responsive">
            <div class="card-body">
                </p>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->surname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form class="btn p-0" action="/admin/deleteuser/{{ $user->id }}" method="post">
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

@endsection
