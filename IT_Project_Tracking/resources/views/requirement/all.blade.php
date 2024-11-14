@extends('engineer')

@section('headTitle','Requirements')
@section('pageTitle','Requirements - ')

@section('content')

<div class="row">
    <div class='col-12'>

        <div class="d-flex justify-content-end">
            <a class="btn btn-dark" href="{{URL::to('requirement/add')}}">
                <i class="fas fa-plus"></i> Add Requirement
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header p-0 position-relative mt-n2 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Requirements table</h6>
              </div>
            </div>

            <div class="card-body px-0 pt-0 pb-1 text-center">
                <div class="table-responsive p-0">

                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >#</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Name</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Requirement Description</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Quantity</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Unit Price</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Requirement Type Name</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Project Name</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($requirements as $requirement)
                            <tr>
                                <td>{{$requirement->Requirement_id}}</td>
                                <td>{{$requirement->Requirement_name}}</td>
                                <td>{{$requirement->Requirement_description}}</td>
                                <td>{{$requirement->Requirement_quantity}}</td>
                                <td>{{$requirement->UnitPrice}}</td>
                                <td>{{$requirement->requirementtypes->RequirementType_Name}}</td>
                                <td>{{$requirement->projects->Project_name}}</td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{URL::to('requirement/edit/'.$requirement->Requirement_id)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a onclick= "return confirm('Are you sure?')" href="{{URL::to('requirement/delete/'.$requirement->Requirement_id)}}">
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
                    <div class="pagn-links">
                    {{$requirements->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection