@extends('layout')

@section('headTitle','Add Milestone - ')
@section('pageTitle','Add Milestone')

@section('content')

<form id="add-milestone-form" method="post" action="{{URL::to('milestone/save')}}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Milestone Description</label>
                        <input type='text' required name="description" class="form-control" placeholder="Enter Description">
                        <label>Milestone duration</label>
                        <input type='text' required name="duration" class="form-control" placeholder="Enter Duration">
                        <label>Milestone Dates</label>
                        <input type='date' required name="date" class="form-control">
                        <select name="Project_id" id="Project_id" class="form-control">
                            <option value="">Please select Project</option>
                            @foreach($projects as $project)
                                <option value="{{$project->Project_id}}">{{$project->Project_name}}</option>
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