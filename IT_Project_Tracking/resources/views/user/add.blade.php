@extends('layout')

@section('headTitle','Add Users')
@section('pageTitle','Add User -')

@section('content')

<form id="add-user-form" method="post" action="{{URL::to('user/save')}}">
    @csrf
    <div class="row mt-4">
        <div class="col-lg-9 col-12 mx-auto position-relative">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <h6 class="mb-0">New User</h6>
                </div>
                <div class="card-body pt-2">
                    <div class="input-group input-group-dynamic">
                        <label class="form-label">Users Names</label>
                        <input type='text' required name="users_names" class="form-control">
                    </div>
                    <label class="mt-4">Email</label>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">Enter Email</label>
                        <input type='string' pattern='[A-Za-z0-9\._%+\-]+@[A-Za-z0-9\.\-]+\.[A-Za-z]{2,}' required name="email" class="form-control">
                    </div>
                    <label>Password</label>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">Enter Password</label>
                        <input type='password' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters' required name="password" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Phone Number</label>
                                <input type='string' pattern='^(\+\d\s?)?\(?\d\)?[\s.-]?\d[\s.-]?\d$' required name="phone_number" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Role</label>
                            <select name="Role_id" id="Role_id" class="form-control">
                                <option value="">Please select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->Role_id}}">{{$role->Role_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-dark m-0 ms-2">Create User</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

@endsection