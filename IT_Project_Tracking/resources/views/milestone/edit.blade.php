@extends('layout')

@section('headTitle','Edit Milestone')
@section('pageTitle','Edit Milestone - ')

@section('content')

<form id="edit-milestone-form" method="post" action="{{URL::to('milestone/update/'.$milestone->Milestone_id)}}">
    @csrf
    <div class="row mt-4">
        <div class="col-lg-9 col-12 mx-auto position-relative">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <h6 class="mb-0">Edit Milestone</h6>
                </div>
                <div class="card-body pt-2">
                    <label class="mt-3">Milestone Description</label>
                    <div class="input-group input-group-outline mb-4">
                        <input type='text' value="{{$milestone->Milestone_description}}" required name="description" class="form-control">
                    </div>
                    <label>Milestone Duration</label>
                    <div class="input-group input-group-outline mb-4">
                        <input type='text' value="{{$milestone->Milestone_duration}}" required name="duration" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Milestone Start Date</label>
                                <input type='date' value="{{$milestone->Start_Date}}" required name="mstart_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Milestone End Date</label>
                                <input type='date' value="{{$milestone->End_Date}}" required name="mend_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            <label>Project</label>
                            <select name="Project_id" id="Project_id" class="form-control">
                                <option value="">Please select Project</option>
                                @foreach($projects as $project)
                                    <option value="{{$project->Project_id}}">{{$project->Project_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mt-4">
                            <label >Status</label>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Enter Status</label>
                                <input type='string' value="{{$milestone->Status}}" required name="mstatus" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-dark m-0 ms-2">Update Milestone</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection