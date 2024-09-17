@extends('layout')

@section('headTitle','Add Organization - ')
@section('pageTitle','Add Organization')

@section('content')

<form id="add-organization-form" method="post" action="{{URL::to('organization/save')}}">
    @csrf
    <div class="row">
        <div class="col-md-8">
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
                        <label>Organization Name</label>
                        <input type='text' required name="organization_name" class="form-control" placeholder="Enter Name">
                        <label>Organization Description</label>
                        <input type='text' required name="organization_description" class="form-control" placeholder="Enter Description">
                    </div>
                    <input type='submit' name="submit" class="form-control btn btn-success">
                </div>
            </div>

        </div>
    </div>
</form>

@endsection