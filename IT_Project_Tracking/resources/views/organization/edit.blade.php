@extends('engineer')

@section('headTitle','Edit Organization')
@section('pageTitle','Edit Organization - ')

@section('content')

<form id="edit-organization-form" method="post" action="{{URL::to('organization/update/'.$organization->Organization_id)}}">
    @csrf
    <div class="row mt-4">
        <div class="col-lg-9 col-12 mx-auto position-relative">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">business</i>
                    </div>
                    <h6 class="mb-0">Edit Organization</h6>
                </div>
                <div class="card-body pt-2">
                    <div class="input-group input-group-dynamic">
                        <input type='text' value="{{$organization->Organization_name}}" required name="organization_name" class="form-control">
                    </div>
                    <label class="mt-4">Organization Description</label>
                    <div class="input-group input-group-outline mb-4">
                        <input type='text' value="{{$organization->Organization_description}}" required name="organization_description" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-dark m-0 ms-2">Update Organization</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

@endsection