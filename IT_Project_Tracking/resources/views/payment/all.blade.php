@extends('admin')

@section('headTitle','Payments')
@section('pageTitle','Payments - ')

@section('content')
<div class="row">
    <div class="col-11 mx-auto position-relative">
        <!-- Add Payment Button -->
        <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-dark" href="{{ URL::to('payment/add') }}">
                <i class="fas fa-plus me-2"></i> Add Payment
            </a>
        </div>

        <!-- Payments Table Card -->
        <div class="card shadow-lg border-radius-lg">
            <!-- Card Header -->
            <div class="card-header p-3 bg-gradient-dark text-white rounded-top">
                <h4 class="mb-0 text-white">Payments Overview</h4>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table align-items-center text-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-8">#</th>
                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-8">Date</th>
                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-8">Status</th>
                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-8">Amount</th>
                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-8">Project Name</th>
                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-8">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payments as $payment)
                            <tr>
                                <td>
                                    <span class="font-weight-semibold text-dark">{{ $payment->Payment_id }}</span>
                                </td>
                                <td>
                                    <span class="text-sm">{{ $payment->Date }}</span>
                                </td>
                                <td>
                                    <span class="badge badge-paid">
                                        <i class="fa-solid fa-check-circle me-1"></i> Paid
                                    </span>
                                </td>
                                <td>
                                    <span class="text-sm text-dark fw-bold">
                                        {{ 'KSH ' . number_format($payment->Project_amount, 2) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-sm text-secondary">
                                        {{ $payment->project->Project_name }}
                                    </span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{URL::to('payment/edit/'.$payment->Payment_id)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <p class="text-secondary mb-0">No payments found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="card-footer d-flex justify-content-center">
                <nav>
                    {{ $payments->links('pagination::bootstrap-4') }}
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Updated CSS -->
<style>
    .badge-paid {
        display: inline-flex;
        align-items: center;
        background-color: #e8f5e9;
        color: #2e7d32;
        font-size: 0.875rem;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 12px;
    }

    .btn-gradient-dark:hover {
        background: linear-gradient(310deg, #3a416f, #141727);
        color: #fff;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        text-align: center;
    }

    .card-footer {
        background-color: #f7f8fc;
        border-top: 1px solid #e8e9f3;
    }
</style>

@endsection