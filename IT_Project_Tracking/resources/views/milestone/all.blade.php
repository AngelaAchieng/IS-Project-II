@extends('layout')

@section('headTitle','Milestones')
@section('pageTitle','Milestones - ')

@section('content')

<div class="row">
    <div class='col-12'>

        <div class="d-flex justify-content-end">
            <a class="btn btn-dark" href="{{URL::to('milestone/add')}}">
                <i class="fas fa-plus"></i> Add Milestone
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header p-0 position-relative mt-n2 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Milestones table</h6>
              </div>
            </div>

            <div class="card-body px-0 pt-0 pb-1 text-center">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >#</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Description</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Milestone Duration</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Start Date</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >End Date</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Project Name</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Status</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($milestones as $milestone)
                            <tr>
                                <td>{{$milestone->Milestone_id}}</td>
                                <td>{{$milestone->Milestone_description}}</td>
                                <td>{{$milestone->Milestone_duration}}</td>
                                <td>{{$milestone->Start_Date}}</td>
                                <td>{{$milestone->End_Date}}</td>
                                <td>{{$milestone->Status}}</td>
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
                                <td colspan="8">No record</td>
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