@extends('layout')

@section('headTitle','Organizations')
@section('pageTitle','Organizations - ')

@section('content')

<div class="row">
    <div class='col-12'>

        <div class="d-flex justify-content-end">
            <a class="btn btn-dark" href="{{URL::to('organization/add')}}">
                <i class="fas fa-plus"></i> Add Organization
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header p-0 position-relative mt-n2 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Organizations table</h6>
              </div>
            </div>

            <div class="card-body px-0 pt-0 pb-1 text-center">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >#</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Organization Name</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Organization Description</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($organizations as $organization)
                            <tr>
                                <td>{{$organization->Organization_id}}</td>
                                <td>{{$organization->Organization_name}}</td>
                                <td>{{$organization->Organization_description}}</td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{URL::to('organization/edit/'.$organization->Organization_id)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a onclick= "return confirm('Are you sure?')" href="{{URL::to('organization/delete/'.$organization->Organization_id)}}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">No record</td>
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
@section('scripts')
    @if (session('status'))
        <script type="text/javascript">
            iziToast.show({
                titleColor: 'white',
                messageColor: 'white',
                icon:'fa-regular fa-circle-check',
                iconColor: 'white',
                backgroundColor: '#17c1e8',
                message:"{{session('status')}}",
                position: 'topRight'
            });
        </script>
    @endif

@endsection