@extends('layouts.backend.app')

@section('title', 'Create Employee')

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
                            <li class="breadcrumb-item active">Create Employee</li>
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
                                <h3 class="card-title">Create Employee</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.employee.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter Address">
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="Enter City">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Experience</label>
                                                <input type="text" class="form-control" name="experience" value="{{ old('experience') }}" placeholder="Enter Experience">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Photo</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>NID No</label>
                                                <input type="text" class="form-control" name="nid_no" value="{{ old('nid_no') }}" placeholder="Enter NID No">
                                            </div>
                                            <div class="form-group">
                                                <label>Salary</label>
                                                <input type="text" class="form-control" name="salary" value="{{ old('salary') }}" placeholder="Enter Salary">
                                            </div>
                                            <div class="form-group">
                                                <label>Vacation</label>
                                                <input type="text" class="form-control" name="vacation" value="{{ old('vacation') }}" placeholder="Enter Vacation">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Create Employee</button>
                                </div>
                            </form>
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