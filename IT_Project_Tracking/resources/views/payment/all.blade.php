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
        <div class="card mb-4" style="width: 50rem;">
            <div class="card-header p-0 position-relative mt-n2 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Payments table</h6>
              </div>
            </div>

            <div class="card-body px-0 pt-0 pb-1 text-center">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Amount</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Project Name</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Date</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($payments as $payment)
                            <tr>
                                <td>{{$payment->Payment_id}}</td>
                                <td>{{$payment->Project_amount}}</td>
                                <td>{{$payment->project->Project_name}}</td>
                                <td>{{$payment->Date}}</td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{URL::to('payment/edit/'.$payment->Payment_id)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a onclick= "return confirm('Are you sure?')" href="{{URL::to('payment/delete/'.$payment->Payment_id)}}">
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