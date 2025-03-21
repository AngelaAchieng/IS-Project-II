@extends('admin')

@section('headTitle','Roles')
@section('pageTitle','Roles - ')

@section('content')

<div class="row">
    <div class='col-12 '>
        <div class="d-flex justify-content-center">
            <a class="btn btn-dark" href="{{URL::to('role/add')}}">
                <i class="fas fa-plus"></i> Add Role
            </a>
        </div>
        <div class="card mb-4" style="width: 50rem;">
            <div class="card-header p-0 position-relative mt-n2 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Roles table</h6>
              </div>
            </div>

            <div class="card-body px-0 pt-0 pb-1 text-center">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >#</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Name</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($roles as $role)
                            <tr>
                                <td>{{$role->Role_id}}</td>
                                <td>{{$role->Role_name}}</td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{URL::to('role/edit/'.$role->Role_id)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure?')" href="{{URL::to('role/delete/'.$role->Role_id)}}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">No record</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagn-links">
                    {{$roles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection