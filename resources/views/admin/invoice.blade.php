@extends('layouts.backend.app')

@section('title', 'Invoice')

@push('css')

@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
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
                                        Phone: (+880) {{ $company->mobile }} {{ $company->phone !== null ? ', +88'.$company->phone : ''  }}<br>
                                        Email: {{ $company->email }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>{{ $customer->name }}</strong><br>
                                        {{ $customer->address }}<br>
                                        {{ $customer->city }}<br>
                                        Phone: (+880) {{ $customer->phone }}<br>
                                        Email: {{ $customer->email }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice #007612</b><br>
                                    <br>
                                    <b>Order ID:</b> 4F3S8J<br>
                                    <b>Payment Due:</b> 2/22/2014<br>
                                    <b>Account:</b> 968-34567
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
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contents as $content)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $content->name }}</td>
                                                    <td>{{ $content->qty }}</td>
                                                    <td>{{ number_format($content->price, 2) }}</td>
                                                    <td>{{ $content->subtotal() }}</td>
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
                                <div class="col-8"></div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <p class="lead">Amount Due 2/22/2014</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td class="text-right">{{ Cart::subtotal() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tax (21%)</th>
                                                <td class="text-right">{{ Cart::tax() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping:</th>
                                                <td class="text-right">00.00</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td class="text-right">{{ Cart::total() }}</td>
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
                                    <a href="{{ route('admin.invoice.print', $customer->id) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                    <button type="button" class="btn btn-success float-right"><i class="fa fa-credit-card"></i> Submit
                                        Payment
                                    </button>
                                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                        <i class="fa fa-download"></i> Generate PDF
                                    </button>
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