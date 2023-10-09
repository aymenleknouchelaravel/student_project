@extends('layouts.admin')

@section('title', 'Dashboard | Add Project')


@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Add Project
            </h3>

        </div>
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('shared.errors')
                    <form action="/admin/addprojectform" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInput4" class="col-sm-3 col-form-label">Select User</label>
                            <div class="col-sm-9">
                                <select name="user_id" class="form-control form-control-sm" id="exampleInput4">
                                    @foreach ($users as $user)
                                        <option value={{ $user->id }}>{{ $user->surname }} {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput1" class="col-sm-3 col-form-label">Name Of Project</label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" id="exampleInput1"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput2" class="col-sm-3 col-form-label">Sf Adresse</label>
                            <div class="col-sm-9">
                                <input name="sf_adresse" type="text" class="form-control" id="exampleInput2"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput5" class="col-sm-3 col-form-label">Sf Name</label>
                            <div class="col-sm-9">
                                <input name="sf_name" type="text" class="form-control" id="exampleInput5"
                                    placeholder=".........">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Add</button>
                        <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

@endsection
