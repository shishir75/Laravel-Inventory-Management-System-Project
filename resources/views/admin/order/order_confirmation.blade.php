@extends('layouts.backend.app')

@section('title', 'Order')

@push('css')
    <style>
        .modal-lg {
            max-width: 50% !important;
        }
    </style>
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Order Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Order Details</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fa fa-globe"></i> {{ config('app.name') }}
                                        <small class="float-right">Date: {{ date('l, d-M-Y h:i:s A') }}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong>Admin, {{ config('app.name') }}</strong><br>
                                        {{ $company->address }}<br>
                                        {{ $company->city }} - {{ $company->zip_code }}, {{ $company->country }}<br>
                                        Phone: (+880) {{ $company->mobile }} {{ $company->phone !== null ? ', +880'.$company->phone : ''  }}<br>
                                        Email: {{ $company->email }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>{{ $order->customer->name }}</strong><br>
                                        {{ $order->customer->address }}<br>
                                        {{ $order->customer->city }}<br>
                                        Phone: (+880) {{ $order->customer->phone }}<br>
                                        Email: {{ $order->customer->email }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice #IMS-{{ $order->created_at->format('Ymd') }}{{ $order->id }}</b><br><br>
                                    <b>Order ID:</b> {{ str_pad($order->id,9,"0",STR_PAD_LEFT) }}<br>
                                    <b>Order Status:</b> <span class="badge {{ $order->order_status == 'approved' ? 'badge-success' : 'badge-warning'  }}">{{ $order->order_status }}</span><br>
                                    <b>Account:</b> {{ $order->customer->account_number }}
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order_details as $order_detail)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $order_detail->product->name }}</td>
                                                    <td>{{ $order_detail->product->code }}</td>
                                                    <td>{{ $order_detail->quantity }}</td>
                                                    <td>{{ $unit_cost = number_format($order_detail->unit_cost, 2) }}</td>
                                                    <td>{{ number_format($unit_cost * $order_detail->quantity, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th style="width:50%">Payment Method:</th>
                                                <td class="text-right">{{ $order->payment_status }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pay</th>
                                                <td class="text-right">{{ number_format($order->pay, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Due</th>
                                                <td class="text-right">{{ number_format($order->due, 2) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4 offset-4">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td class="text-right">{{ number_format($order->sub_total, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tax (21%)</th>
                                                <td class="text-right">{{ number_format($order->vat, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td class="text-right">{{ round($order->total) }} Taka</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    @if($order->order_status === 'approved')
                                        <a href="{{ route('admin.invoice.order_print', $order->id) }}" target="_blank" class="btn btn-default">
                                            <i class="fa fa-print"></i> Print
                                        </a>
                                    @endif
                                    @if($order->order_status === 'pending')
                                        <a href="{{ route('admin.order.confirm', $order->id) }}" class="btn btn-success float-right">
                                            <i class="fa fa-credit-card"></i>
                                            Approved Payment
                                        </a>
                                    @endif
                                    @if($order->order_status === 'approved')
                                        <a href="{{ route('admin.order.download', $order->id) }}" target="_blank" class="btn btn-primary float-right" style="margin-right: 5px;">
                                            <i class="fa fa-download"></i> Generate PDF
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->





@endsection



@push('js')

@endpush