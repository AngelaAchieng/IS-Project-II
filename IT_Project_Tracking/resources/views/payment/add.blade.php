@extends('admin')

@section('headTitle','Add Payment')
@section('pageTitle','Add Payment - ')

@section('content')

<form id="add-milestone-form" method="post" action="{{URL::to('payment/save')}}">
    @csrf
    <div class="row mt-4">
        <div class="col-lg-9 col-12 mx-auto position-relative">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">payment</i>
                    </div>
                    <h6 class="mb-0">New Billing</h6>
                </div>
                <div class="card-body pt-2">
                    <label class="mt-3">Project Amount</label>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">Enter Amount</label>
                        <input type='integer' pattern="^\d+$" title="Please enter an integer value." required name="project_amount" class="form-control">
                    </div>
                    <label>Project</label>
                        <select name="Project_id" id="Project_id" class="form-control">
                            <option value="">Please select Project</option>
                            @foreach($projects as $project)
                                <option value="{{$project->Project_id}}">{{$project->Project_name}}</option>
                            @endforeach
                        </select>
                    <div class="col-6 mb-2">
                        <div class="input-group input-group-static">
                            <label>Date</label>
                            <input type='date' required name="bdate" class="form-control">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-dark m-0 ms-2">Create Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection