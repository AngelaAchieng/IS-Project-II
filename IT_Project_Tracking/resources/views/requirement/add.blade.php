@extends('layout')

@section('headTitle','Add Requirement')
@section('pageTitle','Add Requirement - ')

@section('content')

<form id="add-requirement-form" method="post" action="{{URL::to('requirement/save')}}">
    @csrf
    <div class="row mt-4">
        <div class="col-lg-9 col-12 mx-auto position-relative">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">ballot</i>
                    </div>
                    <h6 class="mb-0">New Requirement</h6>
                </div>
                <div class="card-body pt-2">
                    <div class="input-group input-group-dynamic">
                        <label class="form-label">Requirement Name</label>
                        <input type='text' required name="requirement_name" class="form-control">
                    </div>
                    <label class="mt-4">Requirement Description</label>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">Enter Description</label>
                        <input type='text' required name="requirement_description" class="form-control">
                    </div>
                    <label>Requirement Quantity</label>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">Enter Quantity</label>
                        <input type='integer' required name="requirement_quantity" class="form-control">
                    </div>
                    <label>Unit Price</label>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">Enter Price</label>
                        <input type='integer' required name="unit_price" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label>Requirement Type</label>
                            <select name="RequirementType_id" id="RequirementType_id" class="form-control">
                                <option value="">Please select Requirement Type</option>
                                @foreach($requirementtypes as $requirementtype)
                                    <option value="{{$requirementtype->RequirementType_id}}">{{$requirementtype->RequirementType_Name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label>Project</label>
                            <select name="Project_id" id="Project_id" class="form-control">
                                <option value="">Please select Project</option>
                                @foreach($projects as $project)
                                    <option value="{{$project->Project_id}}">{{$project->Project_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-dark m-0 ms-2">Create Requirement</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection