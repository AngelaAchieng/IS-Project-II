@extends('admin')

@section('headTitle','Payments')
@section('pageTitle','Payments - ')

@section('content')
<div class="row">
    <div class="col-md-8 mb-6 col-12">
        <div class="d-flex">
            <a class="btn btn-dark" href="{{URL::to('payment/add')}}">
                <i class="fas fa-plus"></i> Add Payment
            </a>
        </div>
        <div class="card shadow-xs border mb-4">
            <div class="card-header p-0 position-relative mt-n2 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Payments table</h6>
                </div>
            </div>
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">#</th>
                            <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Date</th>
                            <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Amount</th>
                            <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Project Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payments as $payment)
                            <tr>
                                <td class="d-flex align-items-center py-3 px-4 text-sm">
                                    <span class="font-weight-semibold text-dark ms-1">{{ $payment->Payment_id }}</span>
                                </td>
                                <td>
                                    <span class="text-sm">{{ $payment->Date }}</span>
                                </td>
                                <td>
                                    <div class="badge-paid pl-4">
                                        <i class="fa-solid fa-check"></i> Paid
                                    </div>
                                </td>
                                <td>
                                    <span class="text-sm">{{ 'KSH' . number_format($payment->Project_amount, 2) }}</span>
                                </td>
                                <td>
                                    <span class="text-sm">{{ $payment->project->Project_name }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No payments found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pagn-links">
                    {{$payments->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .badge-paid {
        display: inline-flex;
        align-items: center;
        border: 1px solid #28a745;
        border-radius: 5px;
        background-color: #e6f9e6;
        color: #28a745;
        padding: 5px 10px;
        font-size: 14px;
    }
    .badge-paid .icon {
        margin-right: 5px;
    }
</style>

@endsection