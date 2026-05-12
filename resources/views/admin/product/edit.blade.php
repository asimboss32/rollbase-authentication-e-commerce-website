@extends('admin.master')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Edit Product</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="card card-primary card-outline mb-4">

                    <form action="{{url('/manage/product/update/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                {{-- Product Name --}}
                                <div class="col-md-6">
                                    <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                                      @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                                </div>

                                {{-- SKU --}}
                                <div class="col-md-6">
                                    <label class="form-label">SKU Code (Optinal)</label>
                                    <input type="text" name="sku_code" class="form-control" value="{{ $product->sku_code }}">
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
                                            <option value="{{ $category->id }}" @if ($category->id == $product->cat_id)     
                                           selected 
                                            @endif>{{ $category->name }}</option>
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
                                            <option value="{{ $subcategory->id }}" @if ($subcategory->id == $product->subcat_id)     
                                           selected 
                                            @endif>{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                     @error('subcat_id')
                                            <span class="text-danger">{{$message}}</span>
                                     @enderror
                                </div>

                                {{-- Price Section --}}
                                <div class="col-md-4">
                                    <label class="form-label">Buying Price</label>
                                    <input type="number" name="buying_price" class="form-control" value="{{ $product->buying_price }}">
                                     @error('buying_price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Regular Price <span class="text-danger">*</span></label>
                                    <input type="number" name="regular_price" class="form-control" value="{{ $product->regular_price }}" required>
                                     @error('regular_price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Discount Price</label>
                                    <input type="number" name="discount_price" class="form-control" value="{{ $product->discount_price }}">
                                     @error('discount_price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                {{-- Quantity --}}
                                <div class="col-md-6">
                                    <label class="form-label">Stock Quantity <span class="text-danger">*</span></label>
                                    <input type="number" name="qty" class="form-control" value="{{ $product->qty }}" required>
                                     @error('qty')
                                        <span class="text-danger">{{$message}}</span>
                                     @enderror
                                </div>

                                {{-- Product Type --}}
                                <div class="col-md-6">
                                    <label class="form-label">Product Type <span class="text-danger">*</span></label>
                                    <select name="product_type" class="form-control" required>
                                        <option value="{{old('product_type')}}" >Select Type</option>
                                        <option value="hot" @if ($product->product_type == 'hot') selected @endif>Hot</option>
                                        <option value="new" @if ($product->product_type == 'new') selected @endif>New</option>
                                        <option value="regular" @if ($product->product_type == 'regular') selected @endif>Regular</option>
                                        <option value="discount" @if ($product->product_type == 'discount') selected @endif>Discount</option>
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
                                            @if ($product->color->isNotEmpty())
                                                @foreach ($product->color as $singleColor)
                                                    <input type="text" name="color_name[]" class="form-control mb-2"
                                                        placeholder="Color" id="color_name" value="{{ $singleColor->color_name }}">
                                                @endforeach
                                                
                                            @else
                                                <input type="text" name="color_name[]" class="form-control"placeholder="Color" id="color_name">
                                            @endif
                                            
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
                                            @if ($product->size->isNotEmpty())
                                                @foreach ($product->size as $singleSize)
                                                    <input type="text" name="size_name[]" class="form-control mb-2"
                                                        placeholder="Size" id="size_name" value="{{ $singleSize->size_name }}">
                                                @endforeach
                                            @else
                                                <input type="text" name="size_name[]" class="form-control" id="size_name" placeholder="Size">
                                            @endif
                                            <button type="button" class="btn btn-success add-size"
                                                id="add_size">+</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Description --}}
                                <div class="col-md-12">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="summernote" class="form-control">
                                   {{ $product->description }}
                                </textarea>
                                 @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                                </div>

                                {{-- Policy --}}
                                <div class="col-md-12">
                                    <label class="form-label">Product Policy</label>
                                    <textarea name="product_policy" id="summernote_two" class="form-control">
                                    {{ $product->product_policy }}
                                </textarea>
                                @error('product_policy')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                                </div>

                                {{-- Image --}}
                                <div class="col-md-6">
                                    <label class="form-label">Main Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control"  accept="image/*" >
                                    <img src="{{$product->image}}" height="100" width="100" class="mb-3 mt-1">
                                    @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                                </div>

                                {{-- Gallery --}}
                                <div class="col-md-6">
                                    <label class="form-label">Gallery Images (Optional)</label>
                                 
                                        <input type="file" name="gallery_image[]" class="form-control" accept="image/*" multiple>

                                  @foreach ($product->galleryImages as $singleGalleryImage)
                                   <img src="{{$singleGalleryImage->image}}" height="100" width="100"  class="mb-3 mt-1">
                                    @endforeach
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
