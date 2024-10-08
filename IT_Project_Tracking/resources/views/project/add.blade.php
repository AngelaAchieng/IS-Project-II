@extends('layout')

@section('headTitle','Add Project')
@section('pageTitle','Add Project - ')

@section('content')

<form id="add-project-form" method="post" action="{{URL::to('project/save')}}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                @if ($errors->any())
                        <div class ="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <h6 class="text-white">{{$error}}</h6>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Project Name</label>
                        <input type='text' required name="project_name" class="form-control" placeholder="Enter Project Name">
                        <label>Project Description</label>
                        <input type='text' required name="project_description" class="form-control" placeholder="Enter Project Descriptions">
                        <label>Project Proposal</label>
                        <input type='string' required name="project_proposal" class="form-control" placeholder="Enter Project Proposal">
                        <label>Start Date</label>
                        <input type='date' required name="start_date" class="form-control">
                        <label>End Date</label>
                        <input type='date' required name="end_date" class="form-control">

                        <select name="User_id" id="User_id" class="form-control">
                            <option value="">Please select User</option>
                            @foreach($users as $user)
                                <option value="{{$user->User_id}}">{{$user->UserName}}</option>
                            @endforeach
                        </select>
                        
                        <select name="Organization_id" id="Organization_id" class="form-control">
                            <option value="">Please select Organization</option>
                            @foreach($organizations as $organization)
                                <option value="{{$organization->Organization_id}}">{{$organization->Organization_name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <input type='submit' name="submit" class="form-control btn btn-success">
                </div>
            </div>

        </div>
    </div>
</form>

@endsection