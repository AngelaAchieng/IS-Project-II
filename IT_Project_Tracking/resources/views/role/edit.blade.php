@extends('admin')

@section('headTitle','Edit Role')
@section('pageTitle','Edit Role - ')

@section('content')

<form id="edit-role-form" method="post" action="{{URL::to('role/update/'.$role->Role_id)}}">
    @csrf
    <div class="row mt-4">
        <div class="col-lg-9 col-12 mx-auto position-relative">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">work</i>
                    </div>
                    <h6 class="mb-0">Edit Role</h6>
                </div>
                <div class="card-body pt-2">
                    <label class="mt-3">Role Name</label>
                    <div class="input-group input-group-outline mb-4">
                        <input type='text' value="{{$role->Role_name}}" required name="role_name" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-dark m-0 ms-2">Update Role</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

@endsection