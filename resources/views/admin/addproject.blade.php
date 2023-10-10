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
                                        @if ($user->role != 'admin')
                                            <option value={{ $user->id }}>{{ $user->surname }} {{ $user->name }}
                                            </option>
                                        @endif
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
                        <div class="form-group row">
                            <label for="exampleInput5" class="col-sm-3 col-form-label">project_adresse</label>
                            <div class="col-sm-9">
                                <input name="project_adresse" type="text" class="form-control" id="exampleInput5"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput5" class="col-sm-3 col-form-label">contractor_name</label>
                            <div class="col-sm-9">
                                <input name="contractor_name" type="text" class="form-control" id="exampleInput5"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput5" class="col-sm-3 col-form-label">start_date</label>
                            <div class="col-sm-9">
                                <input name="start_date" type="date" class="form-control" id="exampleInput5"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput5" class="col-sm-3 col-form-label">end_date</label>
                            <div class="col-sm-9">
                                <input name="end_date" type="date" class="form-control" id="exampleInput5"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput5" class="col-sm-3 col-form-label">book_terms</label>
                            <div class="col-sm-9">
                                <input name="book_term" type="date" class="form-control" id="exampleInput5"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput5" class="col-sm-3 col-form-label">commercial_reg_date</label>
                            <div class="col-sm-9">
                                <input name="commercial_reg_date" type="date" class="form-control" id="exampleInput5"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput5" class="col-sm-3 col-form-label">choice_land</label>
                            <div class="col-sm-9">
                                <input name="choice_land" type="date" class="form-control" id="exampleInput5"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput5" class="col-sm-3 col-form-label">amount</label>
                            <div class="col-sm-9">
                                <input name="amount" type="text" class="form-control" id="exampleInput5"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput5" class="col-sm-3 col-form-label">commercial_reg_no</label>
                            <div class="col-sm-9">
                                <input name="commercial_reg_no" type="text" class="form-control" id="exampleInput5"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput5" class="col-sm-3 col-form-label">bank_account_no</label>
                            <div class="col-sm-9">
                                <input name="bank_account_no" type="text" class="form-control" id="exampleInput5"
                                    placeholder=".........">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInput5" class="col-sm-3 col-form-label">project_code</label>
                            <div class="col-sm-9">
                                <input name="project_code" type="text" class="form-control" id="exampleInput5"
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
