@extends('admin.master')

@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Product List</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product List</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Product List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>sku code</th>
                                            <th>Type</th>
                                            <th>Category</th>
                                            <th>SubCategory</th>
                                            <th>Buying Price</th>
                                            <th>Regular Price</th>
                                            <th>Discount Price</th>
                                            <th>Quantity</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr class="align-middle">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td><img src="{{ $product->image }}" alt="Product Image" width="50">
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->sku_code }}</td>
                                                <td>{{ $product->product_type }}</td>
                                                <td>{{ $product->category->name ?? 'N/A' }}</td>
                                                <td>{{ $product->subCategory->name ?? 'N/A' }}</td>
                                                <td>{{ $product->buying_price }}</td>
                                                <td>{{ $product->regular_price }}</td>
                                                <td>{{ $product->discount_price }}</td>
                                                <td>{{ $product->qty }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">

                                                        {{-- Edit --}}
                                                        <a href="{{ url('/manage/product/edit/' . $product->id) }}"
                                                            class="btn btn-sm btn-info" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        {{-- Delete --}}
                                                        <a href="{{ url('/manage/product/delete/' . $product->id) }}"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure?')" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </a>

                                                        {{-- Active / Inactive Toggle --}}
                                                        @if ($product->status == 'active')
                                                            <a href="{{ url('/manage/product/status/' . $product->id) }}"
                                                                class="btn btn-sm btn-success"
                                                                title="Active (Click to Inactive)">
                                                                <i class="fas fa-toggle-on"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ url('/manage/product/status/' . $product->id) }}"
                                                                class="btn btn-sm btn-secondary"
                                                                title="Inactive (Click to Active)">
                                                                <i class="fas fa-toggle-off"></i>
                                                            </a>
                                                        @endif

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                 {{$products->links('pagination::bootstrap-5')}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection
