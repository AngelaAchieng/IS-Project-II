@extends('layout')

@section('headTitle','Add Payment - ')
@section('pageTitle','Add Payment')

@section('content')

<form id="add-milestone-form" method="post" action="{{URL::to('milestone/save')}}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Project Amount</label>
                        <input type='integer' required name="project_amount" class="form-control" placeholder="Enter Amount">
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