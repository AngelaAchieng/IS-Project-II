@extends('layout')

@section('headTitle','Edit Payment - ')
@section('pageTitle','Edit Payment')

@section('content')

<form id="edit-payment-form" method="post" action="{{URL::to('payment/update/'.$payment->Payment_id)}}">
    @csrf
    <div class="row mt-4">
        <div class="col-lg-9 col-12 mx-auto position-relative">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">payment</i>
                    </div>
                    <h6 class="mb-0">Edit Billing</h6>
                </div>
                <div class="card-body pt-2">
                    @if ($errors->any())
                        <div class ="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <h6 class="text-white">{{$error}}</h6>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <label class="mt-3">Project Amount</label>
                    <div class="input-group input-group-outline mb-4">
                        <input type='integer' required name="project_amount" class="form-control">
                    </div>
                    <label>Project</label>
                        <select name="Project_id" id="Project_id" class="form-control">
                            <option value="">Please select Project</option>
                            @foreach($projects as $project)
                                <option value="{{$project->Project_id}}">{{$project->Project_name}}</option>
                            @endforeach
                        </select>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-dark m-0 ms-2">Update Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection