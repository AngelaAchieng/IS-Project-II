@extends('engineer')

@section('headTitle','Requirement Types')
@section('pageTitle','Requirement Types - ')

@section('content')
<div class="row mb-2">
    <div class="col-xl-12">
        <div class="row mt-lg-4 mt-2">
            @forelse($requirementtypes as $requirementtype)
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card p-3 h-100">
                    <div class="card-header mx-4 p-3 text-center position-relative">
                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="material-icons opacity-10">api</i>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                            <div class="dropdown">
                                <button class="btn btn-link text-secondary ps-0 pe-2" id="navbarDropdownMenuLink{{ $requirementtype->RequirementType_id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-lg" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end me-sm-n4 me-n3" aria-labelledby="navbarDropdownMenuLink{{ $requirementtype->RequirementType_id }}">
                                    <a class="dropdown-item" href="{{ URL::to('requirementtype/edit/'.$requirementtype->RequirementType_id) }}">Edit</a>
                                    <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="{{ URL::to('requirementtype/delete/'.$requirementtype->RequirementType_id) }}">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                        <h6 class="text-center mb-0">{{ $requirementtype->RequirementType_Name }}</h6>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-secondary">No Requirement Types Found</p>
            </div>
            @endforelse
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card h-100">
                    <div class="card-header mx-4 p-3 text-center position-relative">
                        <div class="d-flex justify-content-center align-items-center pt-3">
                            <a class="btn btn-dark " href="{{ URL::to('requirementtype/add') }}">
                                <i class="material-icons opacity-10">add</i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h6 class="text-center mb-0">Add Requirement Type</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection