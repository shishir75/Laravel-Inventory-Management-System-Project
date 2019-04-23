@extends('layouts.backend.app')

@section('title', 'Update Product')

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
                            <li class="breadcrumb-item active">Update Product</li>
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
                                <h3 class="card-title">Update Product</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Enter Product Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Product Category</label>
                                                <select name="category_id" class="form-control">
                                                    <option value="" disabled selected>Select a Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $product->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Supplier Name</label>
                                                <select name="supplier_id" class="form-control">
                                                    <option value="" disabled selected>Select a Supplier</option>
                                                    @foreach($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}" {{ $product->supplier->id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Code</label>
                                                <input type="text" class="form-control" name="code" value="{{ $product->code }}" placeholder="Enter Product Code">
                                            </div>
                                            <div class="form-group">
                                                <label>Garage</label>
                                                <select name="garage" class="form-control">
                                                    <option value="" disabled>Select a Garage</option>
                                                    <option value="A" {{ $product->garage == "A" ? 'selected' : '' }}>Garage A</option>
                                                    <option value="B" {{ $product->garage == "B" ? 'selected' : '' }}>Garage B</option>
                                                    <option value="C" {{ $product->garage == "C" ? 'selected' : '' }}>Garage C</option>
                                                    <option value="D" {{ $product->garage == "D" ? 'selected' : '' }}>Garage D</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Route</label>
                                                <select name="route" class="form-control">
                                                    <option value="" disabled>Select a Route</option>
                                                    <option value="A" {{ $product->route == 'A' ? 'selected' : '' }}>Route A</option>
                                                    <option value="B" {{ $product->route == 'B' ? 'selected' : '' }}>Route B</option>
                                                    <option value="C" {{ $product->route == 'C' ? 'selected' : '' }}>Route C</option>
                                                    <option value="D" {{ $product->route == 'D' ? 'selected' : '' }}>Route D</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Product Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                                <img class="mt-2" width="50" height="40" src="{{ URL::asset('storage/product/'. $product->image) }}" alt="{{ $product->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Buying Date</label>
                                                <input type="date" class="form-control" name="buying_date" value="{{ $product->buying_date }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Expire Date</label>
                                                <input type="date" class="form-control" name="expire_date" value="{{ $product->expire_date }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Buying Price</label>
                                                <input type="text" class="form-control" name="buying_price" value="{{ $product->buying_price }}" placeholder="Enter Buying Price">
                                            </div>
                                            <div class="form-group">
                                                <label>Selling Price</label>
                                                <input type="text" class="form-control" name="selling_price" value="{{ $product->selling_price }}" placeholder="Enter Selling Price">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Update $product</button>
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