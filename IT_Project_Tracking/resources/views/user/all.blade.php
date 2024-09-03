@extends('layout')

@section('headTitle','Users - ')
@section('pageTitle','Users')

@section('content')

<div class="row">
    <div class='col-12'>

        <div class="d-flex justify-content-end">
            <a class="btn btn-dark" href="{{URL::to('user/add')}}">
                <i class="fas fa-plus"></i> Add User
            </a>
        </div>
        <div class="card mb-4 text-center">

            <div class="card-body px-0 pt-0 pb-1">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >#</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >First Name</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Last Name</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Email</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{$user->User_id}}</td>
                                <td>{{$user->FirstName}}</td>
                                <td>{{$user->LastName}}</td>
                                <td>{{$user->Email}}</td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{URL::to('user/edit/'.$user->User_id)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{URL::to('user/delete/'.$user->User_id)}}">
                                        <i class="fa-solid fa-trash"></i>
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