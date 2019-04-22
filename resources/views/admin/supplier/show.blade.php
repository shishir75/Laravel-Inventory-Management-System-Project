@extends('layouts.backend.app')

@section('title', 'Show Customer')

@push('css')

@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Show Customer</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Show Customer</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <p>{{ $customer->name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <p>{{ $customer->email }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <p>{{ $customer->phone }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <p>{{ $customer->address }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <p>{{ $customer->city }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Shop Name</label>
                                                <p>{{ $customer->shop_name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Photo</label>
                                                <p>
                                                    <img width="50" height="50" src="{{ URL::asset("storage/customer/".$customer->photo) }}" alt="{{ $customer->name }}">
                                                </p>

                                            </div>
                                            <div class="form-group">
                                                <label>Account Holder</label>
                                                <p>{{ $customer->account_holder }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Account Number</label>
                                                <p>{{ $customer->account_number }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Bank Name</label>
                                                <p>{{ $customer->bank_name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Bank Branch</label>
                                                <p>{{ $customer->bank_branch }}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



@push('js')

@endpush