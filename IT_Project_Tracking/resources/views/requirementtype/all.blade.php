@extends('layout')

@section('headTitle','Requirement Types - ')
@section('pageTitle','Requirement Types')

@section('content')

<div class="row">
    <div class='col-12'>

        <div class="d-flex justify-content-center">
            <a class="btn btn-dark" href="{{URL::to('requirementtype/add')}}">
                <i class="fas fa-plus"></i> Add Requirement Type
            </a>
        </div>
        <div class="card mb-4 text-center" style="width: 50rem;">

            <div class="card-body px-0 pt-0 pb-1">
                <div class="table-responsive p-0">

                    <table class="table align-items-center mb-0" style="width:80%">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >#</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" >Requirement Type Name</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($requirementtypes as $requirementtype)
                            <tr>
                                <td>{{$requirementtype->RequirementType_id}}</td>
                                <td>{{$requirementtype->RequirementType_Name}}</td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{URL::to('requirementtype/edit/'.$requirementtype->RequirementType_id)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a onclick= "return confirm('Are you sure?')" href="{{URL::to('requirementtype/delete/'.$requirementtype->RequirementType_id)}}">
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

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