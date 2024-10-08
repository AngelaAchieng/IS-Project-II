@extends('layout')

@section('headTitle','Payments')
@section('pageTitle','Payments - ')

@section('content')

<div class="row">
    <div class='col-12'>

        <div class="d-flex justify-content-center">
            <a class="btn btn-dark" href="{{URL::to('payment/add')}}">
                <i class="fas fa-plus"></i> Add Payment
            </a>
        </div>
        <div class="card mb-4 text-center" style="width: 50rem;">

            <div class="card-body px-0 pt-0 pb-1">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" style="width:80%">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" style="width:40%">#</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" style="width:40%">Amount</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7" style="width:40%">Project Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($payments as $payment)
                            <tr>
                                <td>{{$payment->Payment_id}}</td>
                                <td>{{$payment->Project_amount}}</td>
                                <td>{{$payment->project->Project_name}}</td>
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
    @if(session('status'))
        <script type="text/javascript">
            iziToast.show({
                icon: 'fa-solid fa-circle-check',
                message: "{{session('status')}}",
                position: 'topRight'
            });
        </script>
    @endif

@endsection