@extends('layout')

@section('headTitle','Projects - ')
@section('pageTitle','Projects')

@section('content')

<div class="row">
    <div class='col-12'>

        <div class="d-flex justify-content-end">
            <a class="btn btn-dark" href="{{URL::to('project/add')}}">
                <i class="fas fa-plus"></i> Add Project
            </a>
        </div>
        <div class="card mb-4 text-center">

            <div class="card-body px-0 pt-0 pb-1">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >#</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Project Name</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Project Description</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Project Proposal</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Start Date</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >End Date</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Engineer Name</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Organization Name</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($projects as $project)
                            <tr>
                                <td>{{$project->Project_id}}</td>
                                <td>{{$project->Project_name}}</td>
                                <td>{{$project->Project_description}}</td>
                                <td>{{$project->Project_proposal}}</td>
                                <td>{{$project->StartDate}}</td>
                                <td>{{$project->EndDate}}</td>
                                <td>{{$project->user->UserName}}</td>
                                <td>{{$project->organization->Organization_name}}</td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{URL::to('project/edit/'.$project->Project_id)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a onclick= "return confirm('Are you sure?')" href="{{URL::to('project/delete/'.$project->Project_id)}}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9">No record</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @if(session('status'))
        <script type="text/javascript">
            iziToast.show({
                icon: 'fa-solid fa-circle-check',
                message: "{{session('status')}}",
                position: 'topRight'
            });
        </script>
    @endif

@endsection