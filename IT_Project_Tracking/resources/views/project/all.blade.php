@extends('engineer')

@section('headTitle','Projects')
@section('pageTitle','Projects - ')

@section('content')
<div class="row">
    <div class="col-md-11 mx-auto position-relative">
        <div class="d-flex justify-content-end">
            <a class="btn btn-dark" href="{{URL::to('project/add')}}">
                <i class="fas fa-plus"></i> Add Project
            </a>
        </div>
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Projects Information</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <ul class="list-group">
                    @forelse($projects as $project)
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="row w-100">
                                <h6 class="mb-3 text-sm">{{ $project->Project_name }}</h6>
                                <div class="d-flex flex-column col-md-6">
                                    <span class="mb-2 text-xs">Project Description: <span class="text-dark font-weight-bold ms-sm-2">{{ $project->Project_description }}</span></span>
                                    <span class="mb-2 text-xs">Project Proposal: <span class="text-dark ms-sm-2 font-weight-bold">{{ $project->Project_proposal }}</span></span>
                                </div>
                                <div class="d-flex flex-column col-md-6">
                                    <span class="mb-2 text-xs">Start Date: <span class="text-dark ms-sm-2 font-weight-bold">{{ $project->StartDate }}</span></span>
                                    <span class="mb-2 text-xs">End Date: <span class="text-dark ms-sm-2 font-weight-bold">{{ $project->EndDate }}</span></span>
                                    <span class="mb-2 text-xs">Status: <span class="text-dark ms-sm-2 font-weight-bold">{{ $project->Status }}</span></span>
                                    <span class="mb-2 text-xs">Engineer Name: <span class="text-dark ms-sm-2 font-weight-bold">{{ $project->user->UserName }}</span></span>
                                    <span class="mb-2 text-xs">Organization Name: <span class="text-dark ms-sm-2 font-weight-bold">{{ $project->organization->Organization_name }}</span></span>
                                </div>
                            </div>
                            <div class="ms-auto text-end">
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{URL::to('project/delete/'.$project->Project_id)}}"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                                <a class="btn btn-link text-dark px-3 mb-0" href="{{URL::to('project/edit/'.$project->Project_id)}}"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="w-100 text-center">
                                <h6 class="text-sm text-secondary">No Projects Found</h6>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection