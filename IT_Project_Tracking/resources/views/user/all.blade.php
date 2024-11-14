@extends('admin')

@section('headTitle','Users')
@section('pageTitle','Users - ')

@section('content')

<div class="row">
    <div class='col-12'>

        <div class="d-flex justify-content-end">
            <a class="btn btn-dark" href="{{URL::to('user/add')}}">
                <i class="fas fa-plus"></i> Add User
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header p-0 position-relative mt-n2 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Users table</h6>
              </div>
            </div>

            <div class="card-body px-0 pt-0 pb-1 text-center">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >#</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Users Names</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Email</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Phone Number</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Role Name</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{$user->User_id}}</td>
                                <td>{{$user->UserName}}</td>
                                <td>{{$user->Email}}</td>
                                <td>{{$user->PhoneNumber}}</td>
                                <td>{{$user->role->Role_name}}</td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{URL::to('user/edit/'.$user->User_id)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a onclick= "return confirm('Are you sure?')" href="{{URL::to('user/delete/'.$user->User_id)}}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No record</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagn-links">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
