@extends('layout')

@section('headTitle','Add Requirement Type')
@section('pageTitle','Add Requirement Type - ')

@section('content')

<form id="add-requirementype-form" method="post" action="{{URL::to('requirementtype/save')}}">
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
                        <label>Requirement Type Name</label>
                        <input type='text' required name="requirementtype_name" class="form-control" placeholder="Enter Name">
                    </div>
                    <input type='submit' name="submit" class="form-control btn btn-success">
                </div>
            </div>

        </div>
    </div>
</form>

@endsection