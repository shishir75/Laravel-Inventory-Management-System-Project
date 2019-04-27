@extends('layouts.backend.app')

@section('title', 'Pos')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.css') }}">
@endpush

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pos</li>
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Customers
                                    <span><a href="{{ route('admin.customer.create') }}" class="btn btn-sm btn-primary float-md-right">Add New</a></span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Customers</label>
                                    <select name="category_id" class="form-control">
                                        <option value="" disabled selected>Select a Customer</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa fa-info"></i>
                                    Shopping Lists
                                    <span class="btn btn-sm btn-info float-md-right">Create Invoice</span>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if($cart_products->count() < 1)
                                    <div class="alert alert-danger">
                                        No Product Added
                                    </div>
                                @else
                                    <table class="table table-bordered table-striped text-center mb-3">
                                        <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Name</th>
                                            <th width="17%">Qty</th>
                                            <th>Price</th>
                                            <th>Sub Total</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cart_products as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-left">{{ $product->name }}</td>

                                                <form action="{{ route('admin.cart.update', $product->rowId) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <td>
                                                        <input type="number" name="qty" class="form-control" value="{{ $product->qty }}">
                                                    </td>
                                                    <td>{{ $price = number_format($product->price, 2) }}</td>
                                                    <td>{{ $price * $product->qty }}</td>
                                                    <td>
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </form>
                                                
                                                <td>
                                                    <button class="btn btn-danger" type="button" onclick="deleteItem({{ $product->id }})">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $product->id }}" action="{{ route('admin.cart.destroy', $product->rowId) }}" method="post"
                                                          style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif

                                <div class="alert alert-info">
                                    <p>Quantity : {{ Cart::count() }}</p>
                                    <p>Sub Total : {{ Cart::subtotal() }} Taka</p>
                                    Tax : {{ Cart::tax() }} Taka
                                </div>
                                <div class="alert alert-success">
                                    Total : {{ Cart::total() }} Taka
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>

                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">POS</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Product Code</th>
                                        <th>Add To Cart</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Product Code</th>
                                        <th>Add To Cart</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <form action="{{ route('admin.cart.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="price" value="{{ $product->selling_price }}">

                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>
                                                    <img width="40" height="40" class="img-fluid" src="{{ URL::asset('storage/product/'. $product->image) }}" alt="{{ $product->name }}">
                                                </td>
                                                <td>{{ number_format($product->selling_price, 2) }}</td>
                                                <td>{{ strtoupper($product->code) }}</td>
                                                <td>
                                                    <button type="submit" class="btn btn-sm btn-success px-2">
                                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
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
    </div> <!-- Content Wrapper end -->
@endsection




@push('js')

    <!-- DataTables -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('assets/backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/backend/plugins/fastclick/fastclick.js') }}"></script>

    <!-- Sweet Alert Js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>


    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>


    <script type="text/javascript">
        function deleteItem(id) {
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>



@endpush