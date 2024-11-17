@extends('engineer')

@section('headTitle','Organizations')
@section('pageTitle','Organizations - ')

@section('content')
<section class="py-3 px-md-4">
    <div class="d-flex justify-content-end">
        <a class="btn btn-dark" href="{{ URL::to('organization/add') }}">
            <i class="fas fa-plus"></i> Add Organization
        </a>
    </div>
    <div class="row mt-lg-4 mt-2 mb-2">
        @forelse($organizations as $organization)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex mt-n2">
                            <!-- Displaying Organization_id -->
                            <div class="avatar avatar-xl bg-gradient-dark border-radius-xl p-2 mt-n4">
                                <span class="text-white">{{ $organization->Organization_id }}</span>
                            </div>
                            <div class="ms-3 my-auto">
                                <!-- Displaying Organization_name -->
                                <h6 class="mb-0">{{ $organization->Organization_name }}</h6>
                            </div>
                            <div class="ms-auto">
                                <div class="dropdown">
                                    <button class="btn btn-link text-secondary ps-0 pe-2" id="navbarDropdownMenuLink{{ $organization->Organization_id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-lg" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end me-sm-n4 me-n3" aria-labelledby="navbarDropdownMenuLink{{ $organization->Organization_id }}">
                                        <a class="dropdown-item" href="{{ URL::to('organization/edit/' . $organization->Organization_id) }}">Edit</a>
                                        <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="{{ URL::to('organization/delete/' . $organization->Organization_id) }}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Displaying Organization_description -->
                        <p class="text-sm mt-3">{{ $organization->Organization_description }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>No organizations found.</p>
        @endforelse
    </div>
</section>

@endsection
