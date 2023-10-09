@extends('layouts.admin')

@section('title', 'Dashboard | Add User')


@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Add User
            </h3>

        </div>
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('shared.errors')
                    <form action="/admin/adduserform" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInput1" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" id="exampleInput1"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput2" class="col-sm-3 col-form-label">Surname</label>
                            <div class="col-sm-9">
                                <input name="surname" type="text" class="form-control" id="exampleInput2"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input name="email" type="text" class="form-control" id="exampleInput2"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput2" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input name="password" type="text" class="form-control" id="exampleInput2"
                                    placeholder=".........">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Add User</button>
                        <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

@endsection
