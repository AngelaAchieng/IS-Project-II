@extends('layout')

@section('headTitle','Add Role - ')
@section('pageTitle','Add Role')

@section('content')

<form id="add-role-form" method="post" action="{{URL::to('role/save')}}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Role Name</label>
                        <input type='text' pattern='[a-zA-Z]{2,}' title='Letters Only' required name="role_name" class="form-control" placeholder="Enter role">
                    </div>
                    <input type='submit' name="submit" class="form-control btn btn-success">
                </div>
            </div>

        </div>
    </div>
</form>

@endsection