@extends('engineer')

@section('headTitle','Add Project')
@section('pageTitle','Add Project - ')

@section('content')

<form id="add-project-form" method="post" action="{{URL::to('project/save')}}">
    @csrf
    <div class="row mt-1">
        <div class="col-lg-9 col-12 mx-auto position-relative">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">event</i>
                    </div>
                    <h6 class="mb-0">New Project</h6>
                </div>
                <div class="card-body pt-2">
                    <div class="input-group input-group-dynamic">
                        <label class="form-label">Project Name</label>
                        <input type='text' required name="project_name" class="form-control">
                    </div>
                    <label class="mt-4">Project Description</label>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">Enter Description</label>
                        <input type='text' required name="project_description" class="form-control">
                    </div>
                    <label >Project Proposal</label>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">Enter Proposal Details</label>
                        <input type='string' required name="project_proposal" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <div class="input-group input-group-static">
                                <label>Start Date</label>
                                <input type='date' required name="start_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <div class="input-group input-group-static">
                                <label>End Date</label>
                                <input type='date' name="end_date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" id="completed" value="Completed">
                            <label class="form-check-label" for="completed">Completed</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" id="pending" value="Pending">
                            <label class="form-check-label" for="pending">Pending</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-1">
                            <label>User</label>
                            <select name="User_id" id="User_id" class="form-control">
                                <option value="">Please select User</option>
                                @foreach($users as $user)
                                    <option value="{{$user->User_id}}">{{$user->UserName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mt-1">
                            <label>Organization</label>
                            <select name="Organization_id" id="Organization_id" class="form-control">
                                <option value="">Please select Organization</option>
                                @foreach($organizations as $organization)
                                    <option value="{{$organization->Organization_id}}">{{$organization->Organization_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-dark m-0 ms-2">Create Project</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

@endsection