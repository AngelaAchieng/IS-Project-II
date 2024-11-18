@extends('engineer')

@section('headTitle','Requirements')
@section('pageTitle','Requirements - ')

@section('content')

    <div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Requirements list</h6>
                </div>
                <div class="ms-auto d-flex">
                <a class="btn btn-dark" href="{{URL::to('requirement/add')}}">
                    <i class="fas fa-plus"></i> Add Requirement
                </a>
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead class="bg-gray-100">
                        <tr>
                        <th class="text-center text-xs font-weight-semibold opacity-7">#</th>
                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Requirement Name</th>
                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Requirement Description</th>
                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Quantity</th>
                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Unit Price</th>
                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Requirement Type</th>
                        <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($requirements as $requirement)
                        <tr>
                            <td class="align-middle text-center">{{$requirement->Requirement_id}}</td>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center ms-1">
                                <h6 class="mb-0 text-sm font-weight-semibold">{{$requirement->Requirement_name}}</h6>
                                <p class="text-sm text-secondary mb-0">{{$requirement->projects->Project_name}}</p>
                                </div>
                            </div>
                            </td>
                            <td class="align-middle text-center text-sm">{{$requirement->Requirement_description}}</td>
                            <td class="align-middle text-center text-sm">{{$requirement->Requirement_quantity}}</td>
                            <td class="align-middle text-center text-sm">{{$requirement->UnitPrice}}</td>
                            <td class="align-middle text-center text-sm">{{$requirement->requirementtypes->RequirementType_Name}}</td>
                            <td class="align-middle text-center text-sm">
                            <a href="{{URL::to('requirement/edit/'.$requirement->Requirement_id)}}" class="text-secondary font-weight-bold text-xs">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a onclick="return confirm('Are you sure?')" href="{{URL::to('requirement/delete/'.$requirement->Requirement_id)}}" class="text-secondary font-weight-bold text-xs">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-secondary">No requirements found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pagn-links">
                    {{$requirements->links()}}
                </div>
              <div class="border-top py-3 px-3 d-flex align-items-center">
                <p class="font-weight-semibold mb-0 text-dark text-sm">Page 1 of 1</p>
                <div class="ms-auto">
                  <button class="btn btn-sm btn-white mb-0">Previous</button>
                  <button class="btn btn-sm btn-white mb-0">Next</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

@endsection