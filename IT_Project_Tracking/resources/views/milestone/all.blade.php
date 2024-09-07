@extends('layout')

@section('headTitle','Milestones - ')
@section('pageTitle','Milestones')

@section('content')

<div class="row">
    <div class='col-12'>

        <div class="d-flex justify-content-end">
            <a class="btn btn-dark" href="{{URL::to('milestone/add')}}">
                <i class="fas fa-plus"></i> Add Milestone
            </a>
        </div>
        <div class="card mb-4 text-center">

            <div class="card-body px-0 pt-0 pb-1">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >#</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Milestone Description</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Milestone Timeline</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Milestone Dates</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Project Name</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($milestones as $milestone)
                            <tr>
                                <td>{{$milestone->Milestone_id}}</td>
                                <td>{{$milestone->Milestone_description}}</td>
                                <td>{{$milestone->Milestone_timeline}}</td>
                                <td>{{$milestone->Milestone_dates}}</td>
                                <td>{{$milestone->project->Project_name}}</td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{URL::to('milestone/edit/'.$milestone->Milestone_id)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a onclick= "return confirm('Are you sure?')" href="{{URL::to('milestone/delete/'.$milestone->Milestone_id)}}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No record</td>
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