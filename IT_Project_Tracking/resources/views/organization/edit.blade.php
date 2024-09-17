@extends('layout')

@section('headTitle','Edit Organization - ')
@section('pageTitle','Edit Organization')

@section('content')

<form id="edit-organization-form" method="post" action="{{URL::to('organization/update/'.$organization->Organization_id)}}">
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
                        <input type='text' value="{{$organization->Organization_name}}" required name="organization_name" class="form-control" placeholder="Enter Name">
                        <label>Organization Description</label>
                        <input type='text' value="{{$organization->Organization_description}}" required name="organization_description" class="form-control" placeholder="Enter Description">
                    </div>
                    <input value="Update" type='submit' name="submit" class="form-control btn btn-success">
                </div>
            </div>

        </div>
    </div>
</form>

@endsection