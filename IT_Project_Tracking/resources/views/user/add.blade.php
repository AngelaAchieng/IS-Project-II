@extends('layout')

@section('headTitle','Add Users - ')
@section('pageTitle','Add User')

@section('content')

<form id="add-user-form" method="post" action="{{URL::to('user/save')}}">
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
                        <label>Users Names</label>
                        <input type='text' required name="users_names" class="form-control" placeholder="Enter Users Names">
                        <label>Email</label>
                        <input type='string' pattern='[A-Za-z0-9\._%+\-]+@[A-Za-z0-9\.\-]+\.[A-Za-z]{2,}' required name="email" class="form-control" placeholder="Enter Email">
                        <label>Password</label>
                        <input type='password' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters' required name="password" class="form-control" placeholder="Enter Password">
                        <select name="Role_id" id="Role_id" class="form-control">
                            <option value="">Please select Role</option>
                            @foreach($roles as $role)
                                <option value="{{$role->Role_id}}">{{$role->Role_name}}</option>
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