@extends('admin')

@section('headTitle','Users')
@section('pageTitle','Users - ')

@section('content')

<div class="row">
    <div class="d-flex justify-content-end">
        <a class="btn btn-dark" href="{{URL::to('user/add')}}">
            <i class="fas fa-plus"></i> Add User
        </a>
    </div>
    @forelse($users as $user)
    <div class="col-lg-3 col-md-6 col-12 mb-4">
        <div class="card p-3 h-100">
            <!-- User Picture -->
            <div class="card-header mx-auto p-3 text-center position-relative">
                <img src="{{URL::to('img/bruce-mars.jpg')}}" 
                     alt="User Picture" 
                     class="rounded-circle img-fluid shadow" 
                     style="width: 100px; height: 100px; object-fit: cover;">
            </div>
            
            <!-- User Information -->
            <div class="card-body text-center">
                <h6 class="text-center mb-1 font-weight-bold">{{ $user->UserName }}</h6>
                <p class="mb-1 text-secondary text-sm">{{ $user->Email }}</p>
                <p class="mb-1 text-secondary text-sm">Phone: {{ $user->PhoneNumber }}</p>
                <p class="mb-1 text-secondary text-sm">Role: {{ $user->role->Role_name }}</p>
            </div>

            <!-- Actions -->
            <div class="card-footer d-flex justify-content-center">
                <a href="{{ URL::to('user/edit/' . $user->User_id) }}" class="btn btn-sm btn-primary me-2">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>
                <a onclick="return confirm('Are you sure?')" 
                   href="{{ URL::to('user/delete/' . $user->User_id) }}" 
                   class="btn btn-sm btn-danger">
                    <i class="fa-solid fa-trash-can"></i> Delete
                </a>
            </div>
        </div>
    </div>
    @empty
    <!-- No User Records Found -->
    <div class="col-12 text-center">
        <p class="text-secondary">No Users Found</p>
    </div>
    @endforelse
</div>


@endsection
