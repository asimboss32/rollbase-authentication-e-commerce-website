@extends('admin.master')

@section('content')
    <main class="app-main">

        <!-- Page Header -->
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h3 class="mb-0 fw-bold">
                            <i class="fas fa-star text-warning me-2"></i>
                            Add New Review
                        </h3>
                        <small class="text-muted">
                            Add customer reviews for products
                        </small>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item">
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Add Review
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="app-content">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-lg-12">

                        <div class="card shadow border-0 rounded-4">

                            <!-- Card Header -->
                            <div class="card-header bg-primary text-white rounded-top-4 py-3">
                                <h5 class="mb-0">
                                    <i class="fas fa-edit me-2"></i>
                                    Review Information
                                </h5>
                            </div>

                            <!-- Form -->
                            <form action="{{ url('/manage/review-update/' . $review->id) }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="card-body p-4">

                                    <div class="row">

                                        <!-- Product Select -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Select Product
                                                <span class="text-danger">*</span>
                                            </label>

                                            <select name="product_id" id="product_id" class="form-select shadow-sm"
                                                required>

                                                <option value="" disabled selected>
                                                    -- Select Product --
                                                </option>

                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" @if ($product->id == $review->product_id)
                                                        selected
                                                    @endif>
                                                        {{ $product->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Customer Name -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Customer Name
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="text" class="form-control shadow-sm" name="customer_name"
                                                id="customer_name" placeholder="Enter customer name" value="{{ $review->customer_name }}" required>
                                        </div>

                                        <!-- Rating -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Customer Rating
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="number" class="form-control shadow-sm" name="rating"
                                                id="rating" min="1" max="5"
                                                placeholder="Give rating (1 to 5)" value="{{ $review->rating }}" required>

                                            <small class="text-muted">
                                                Rating should be between 1 to 5
                                            </small>
                                        </div>

                                        <!-- Image Upload -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Customer Image
                                            </label>

                                            <input type="file" class="form-control shadow-sm" name="image"
                                                id="image" accept="image/*">

                                            <small class="text-muted">
                                                JPG, PNG, JPEG supported
                                            </small>
                                        </div>

                                        <!-- Image Preview -->
                                        <div class="col-md-12 mb-4 text-center">
                                           @if ($review->image != null)
                                                <img id="previewImage" src="{{ $review->image }}" alt="Image Preview"
                                                    
                                                @else
                                                <img id="previewImage" src="{{ asset('admin/assets/img/default-user.png') }}" alt="Default Image"
                                                @endif
                                           
                                                class="rounded shadow border" width="150" height="150"
                                                style="object-fit: cover;">
                                        </div>

                                        <!-- Comments -->
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label fw-semibold">
                                                Customer Message
                                                <span class="text-danger">*</span>
                                            </label>

                                            <textarea name="comments" id="comments" rows="5" class="form-control shadow-sm"
                                                placeholder="Write customer review..." required>{{ $review->comments }}</textarea>
                                        </div>

                                    </div>
                                </div>

                                <!-- Footer -->
                                <div class="card-footer bg-light py-3">

                                    <div class="d-flex justify-content-end gap-2">

                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="fas fa-sync-alt me-1"></i>
                                            Update Review
                                        </button>

                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Image Preview Script -->
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const [file] = e.target.files;

            if (file) {
                document.getElementById('previewImage').src =
                    URL.createObjectURL(file);
            }
        });
    </script>
@endsection
