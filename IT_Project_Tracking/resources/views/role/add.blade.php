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
                        <input type='text' pattern='[a-zA-Z]' title='Letters Only' required name="role_name" class="form-control" placeholder="Enter role">
                    </div>
                    <input type='submit' name="submit" class="form-control btn btn-success">
                </div>
            </div>

        </div>
    </div>
</form>

@endsection