@extends('admin.master')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Add New Product</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="card card-primary card-outline mb-4">

                    <form action="{{url('/manage/product/store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                {{-- Product Name --}}
                                <div class="col-md-6">
                                    <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                                      @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                                </div>

                                {{-- SKU --}}
                                <div class="col-md-6">
                                    <label class="form-label">SKU Code (Optinal)</label>
                                    <input type="text" name="sku_code" class="form-control" value="{{old('sku_code')}}">
                                     @error('sku_code')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                {{-- Category --}}
                                <div class="col-md-6">
                                    <label class="form-label">Category <span class="text-danger">*</span></label>
                                    <select name="cat_id" id="cat_id" class="form-control">
                                        <option value="{{old('name')}}" disabled selected>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                     @error('cat_id')
                                        <span class="text-danger">{{$message}}</span>
                                     @enderror
                                </div>

                                {{-- Subcategory --}}
                                <div class="col-md-6">
                                    <label class="form-label">SubCategory</label>
                                    <select name="subcat_id" id="subcat_id" class="form-control">
                                        <option value="{{old('name')}}" disabled selected>Select Subcategory</option>
                                        @foreach ($subCategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                     @error('subcat_id')
                                            <span class="text-danger">{{$message}}</span>
                                     @enderror
                                </div>

                                {{-- Price Section --}}
                                <div class="col-md-4">
                                    <label class="form-label">Buying Price</label>
                                    <input type="number" name="buying_price" class="form-control" value="{{old('buying_price')}}">
                                     @error('buying_price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Regular Price <span class="text-danger">*</span></label>
                                    <input type="number" name="regular_price" class="form-control" value="{{old('regular_price')}}" required>
                                     @error('regular_price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Discount Price</label>
                                    <input type="number" name="discount_price" class="form-control" value="{{old('discount_price')}}">
                                     @error('discount_price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                {{-- Quantity --}}
                                <div class="col-md-6">
                                    <label class="form-label">Stock Quantity <span class="text-danger">*</span></label>
                                    <input type="number" name="qty" class="form-control" value="{{old('qty')}}" required>
                                     @error('qty')
                                        <span class="text-danger">{{$message}}</span>
                                     @enderror
                                </div>

                                {{-- Product Type --}}
                                <div class="col-md-6">
                                    <label class="form-label">Product Type <span class="text-danger">*</span></label>
                                    <select name="product_type" class="form-control" required>
                                        <option value="{{old('product_type')}}">Select Type</option>
                                        <option value="hot">Hot</option>
                                        <option value="new">New</option>
                                        <option value="regular">Regular</option>
                                        <option value="discount">Discount</option>
                                    </select>
                                     @error('product_type')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                {{-- Colors --}}
                                <div class="col-md-6">
                                    <label class="form-label">Colors (optional)</label>
                                    <div id="color_fields">
                                        <div class="input-group mb-2">
                                            <input type="text" name="color_name[]" class="form-control"
                                                placeholder="Color" id="color_name">
                                            <button type="button" id="add_color"
                                                class="btn btn-success add-color">+</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Sizes --}}
                                <div class="col-md-6">
                                    <label class="form-label">Sizes (optional)</label>
                                    <div id="size_fields">
                                        <div class="input-group mb-2">
                                            <input type="text" name="size_name[]" class="form-control" id="size_name"
                                                placeholder="Size">
                                            <button type="button" class="btn btn-success add-size"
                                                id="add_size">+</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Description --}}
                                <div class="col-md-12">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="summernote" class="form-control">
                                   {{old('description')}}
                                </textarea>
                                 @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                                </div>

                                {{-- Policy --}}
                                <div class="col-md-12">
                                    <label class="form-label">Product Policy</label>
                                    <textarea name="product_policy" id="summernote_two" class="form-control">
                                    {{old('product_policy')}}
                                </textarea>
                                @error('product_policy')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                                </div>

                                {{-- Image --}}
                                <div class="col-md-6">
                                    <label class="form-label">Main Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control"  accept="image/*" required>
                                    @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                                </div>

                                {{-- Gallery --}}
                                <div class="col-md-6">
                                    <label class="form-label">Gallery Images (Optional)</label>
                                    <input type="file" name="gallery_image[]" class="form-control" accept="image/*" multiple>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary px-4">Save Product</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote_two').summernote();
        });
    </script>

    {{-- Add More Color --}}
    <script>
        $(document).ready(function() {
            $("#add_color").click(function() {
                $(this).before(
                    '<input type="text" class="form-control mb-2" name="color_name[]" placeholder="Color Name" id="color_name"/>'
                    )
            })
        });
    </script>

    {{-- Add More Size --}}
    <script>
        $(document).ready(function() {
            $("#add_size").click(function() {
                $(this).before(
                    '<input type="text" class="form-control mb-2" name="size_name[]" placeholder="Size Name" id="size_name"/>'
                    )
            })
        });
    </script>
@endpush
