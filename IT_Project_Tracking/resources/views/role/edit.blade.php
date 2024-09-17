@extends('layout')

@section('headTitle','Edit Role - ')
@section('pageTitle','Edit Role')

@section('content')

<form id="edit-role-form" method="post" action="{{URL::to('role/update/'.$role->Role_id)}}">
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
                        <label>Role Name</label>
                        <input type='text' value="{{$role->Role_name}}" required name="role_name" class="form-control" placeholder="Enter role">
                    </div>
                    <input value="Update" type='submit' name="submit" class="form-control btn btn-success">
                </div>
            </div>

        </div>
    </div>
</form>

@endsection