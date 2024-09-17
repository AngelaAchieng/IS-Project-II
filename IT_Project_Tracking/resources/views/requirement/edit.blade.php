@extends('layout')

@section('headTitle','Edit Requirement - ')
@section('pageTitle','Edit Requirement')

@section('content')

<form id="edit-requirement-form" method="post" action="{{URL::to('requirement/update/'.$requirement->Requirement_id)}}">
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
                        <label>Requirement Name</label>
                        <input type='text' value="{{$requirement->Requirement_name}}" required name="requirement_name" class="form-control" placeholder="Enter Name">
                        <label>Requirement Description</label>
                        <input type='text' value="{{$requirement->Requirement_description}}" required name="requirement_description" class="form-control" placeholder="Enter Descriptions">
                        <label>Requirement Quantity</label>
                        <input type='integer' value="{{$requirement->Requirement_quantity}}" required name="requirement_quantity" class="form-control" placeholder="Enter Quantity">
                        <label>Unit Price</label>
                        <input type='integer' value="{{$requirement->UnitPrice}}" required name="unit_price" class="form-control" placeholder="Enter Price">

                        <select name="RequirementType_id" id="RequirementType_id" class="form-control">
                            <option value="">Please select Requirement Type</option>
                            @foreach($requirementtypes as $requirementtype)
                                <option value="{{$requirementtype->RequirementType_id}}">{{$requirementtype->RequirementType_name}}</option>
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