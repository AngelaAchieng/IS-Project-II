@extends('layout')

@section('headTitle','Edit Milestone - ')
@section('pageTitle','Edit Milestone')

@section('content')

<form id="edit-milestone-form" method="post" action="{{URL::to('milestone/update/'.$milestone->Milestone_id)}}">
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
                        <label>Milestone Description</label>
                        <input type='text' value="{{$milestone->Milestone_description}}" required name="description" class="form-control" placeholder="Enter Description">
                        <label>Milestone Duration</label>
                        <input type='text' value="{{$milestone->Milestone_duration}}" required name="duration" class="form-control" placeholder="Enter Duration">
                        <label>Milestone Dates</label>
                        <input type='date' value="{{$milestone->Milestone_dates}}" required name="date" class="form-control">
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