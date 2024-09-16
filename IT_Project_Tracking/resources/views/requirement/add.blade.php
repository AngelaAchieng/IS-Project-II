@extends('layout')

@section('headTitle','Add Requirement - ')
@section('pageTitle','Add Requirement')

@section('content')

<form id="add-requirement-form" method="post" action="{{URL::to('requirement/save')}}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Requirement Name</label>
                        <input type='text' required name="requirement_name" class="form-control" placeholder="Enter Name">
                        <label>Requirement Description</label>
                        <input type='text' required name="requirement_description" class="form-control" placeholder="Enter Descriptions">
                        <label>Requirement Quantity</label>
                        <input type='integer' required name="requirement_quantity" class="form-control" placeholder="Enter Quantity">
                        <label>Unit Price</label>
                        <input type='integer' required name="unit_price" class="form-control" placeholder="Enter Price">

                        <select name="RequirementType_id" id="RequirementType_id" class="form-control">
                            <option value="">Please select Requirement Type</option>
                            @foreach($requirementtypes as $requirementtype)
                                <option value="{{$requirementtype->RequirementType_id}}">{{$requirementtype->RequirementType_Name}}</option>
                            @endforeach
                        </select>
                        
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