@extends('layout')

@section('headTitle','Roles - ')
@section('pageTitle','Roles')

@section('content')

<div class="row">
    <div class='col-12'>

        <div class="d-flex justify-content-end">
            <a class="btn btn-dark" href="{{URL::to('role/add')}}">
                <i class="fas fa-plus"></i> Add Role
            </a>
        </div>
        <div class="card mb-4 text-center" style="width: 50rem;">

            <div class="card-body px-0 pt-0 pb-1">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" style="width:80%">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" style="width:40%">#</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" style="width:40%">Name</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7"style="width:40%">Actions</th>
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
                                    <a href="{{URL::to('role/delete/'.$role->Role_name)}}">
                                        <i class="fa-solid fa-trash"></i>
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection