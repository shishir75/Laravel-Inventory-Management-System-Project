@extends('layouts.backend.app')

@section('title', 'Show Employee')

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
                            <li class="breadcrumb-item active">Show Employee</li>
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
                                <h3 class="card-title">Show Employee</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <p>{{ $employee->name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <p>{{ $employee->email }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <p>{{ $employee->phone }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <p>{{ $employee->address }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <p>{{ $employee->city }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Experience</label>
                                                <p>{{ $employee->experience }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Photo</label>
                                                <p>
                                                    <img width="50" height="50" src="{{ URL::asset("storage/employee/".$employee->photo) }}" alt="{{ $employee->name }}">
                                                </p>

                                            </div>
                                            <div class="form-group">
                                                <label>NID No</label>
                                                <p>{{ $employee->nid_no }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Salary</label>
                                                <p>{{ $employee->salary }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Vacation</label>
                                                <p>{{ $employee->vacation }}</p>
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