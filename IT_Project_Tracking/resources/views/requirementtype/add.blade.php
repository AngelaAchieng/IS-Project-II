@extends('engineer')

@section('headTitle','Add Requirement Type')
@section('pageTitle','Add Requirement Type - ')

@section('content')

<form id="add-requirementype-form" method="post" action="{{URL::to('requirementtype/save')}}">
    @csrf
    <div class="row mt-4">
        <div class="col-lg-9 col-12 mx-auto position-relative">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">checklist</i>
                    </div>
                    <h6 class="mb-0">New Requirement Type</h6>
                </div>
                <div class="card-body pt-2">
                    <label class="mt-3">Requirement Type Name</label>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">Enter Name</label>
                        <input type='text' required name="requirementtype_name" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-dark m-0 ms-2">Create Requirement Type</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

@endsection