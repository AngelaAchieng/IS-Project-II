@extends('layout')

@section('headTitle','Edit Users - ')
@section('pageTitle','Edit User')

@section('content')

    <form id="edit-user-form" method="post" action="{{URL::to('user/update/'.$user->User_id')}}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" value="{{ $user->Firstname }}" required name="first_name" class="form-control" placeholder="Enter First Name">
                            <label>Last Name</label>
                            <input type="text" value="{{ $user->Lastname }}" required name="first_name" class="form-control" placeholder="Enter First Name">
                            <label>Email</label>
                            <input type="email" value="{{ $user->Email }}" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" required name="email" class="form-control" placeholder="Enter Email">
                            <label>Password</label>
                            <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters" required name="password" class="form-control" placeholder="Enter Password">

                            <select name="Role_id" id="Role_id" class="form-control">
                                <option value="">Please select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->Role_id}}">{{$role->Role_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input value="Update" type="submit" name="submit" class="form-control btn btn-success">
                    </div>
                </div>

            </div>
        </div>
    </form>

@endsection