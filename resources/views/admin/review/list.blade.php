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
                            Review List
                        </h3>
                        <small class="text-muted">
                            Manage customer product reviews
                        </small>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item">
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Review List
                            </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <!-- App Content -->
        <div class="app-content">
            <div class="container-fluid">

                <div class="card shadow border-0 rounded-4">

                    <!-- Card Header -->
                    <div
                        class="card-header bg-primary text-white rounded-top-4 py-3 d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">
                            <i class="fas fa-comments me-2"></i>
                            Customer Reviews
                        </h5>

                        <span class="badge bg-light text-dark fs-6">
                            Total: {{ count($reviews) }}
                        </span>

                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-3">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle text-center">

                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Image</th>
                                        <th>Customer</th>
                                        <th>Comments</th>
                                        <th>Rating</th>
                                        <th width="180">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse ($reviews as $review)
                                        <tr>

                                            <!-- Serial -->
                                            <td class="fw-bold">
                                                {{ $loop->iteration }}
                                            </td>

                                            <!-- Product -->
                                            <td>
                                                <span class="fw-semibold">
                                                    {{ $review->product->name }}
                                                </span>
                                            </td>

                                            <!-- Image -->
                                            <td>
                                                @if ($review->image)
                                                    <img src="{{ $review->image }}" class="rounded-circle border shadow-sm"
                                                        width="55" height="55" style="object-fit: cover;">
                                                @else
                                                    <div class="bg-light border rounded-circle d-flex align-items-center justify-content-center mx-auto"
                                                        style="width:55px;height:55px;">
                                                        <i class="fas fa-user text-secondary"></i>
                                                    </div>
                                                @endif
                                            </td>

                                            <!-- Customer -->
                                            <td>
                                                <span class="fw-semibold text-dark">
                                                    {{ $review->customer_name }}
                                                </span>
                                            </td>

                                            <!-- Comment -->
                                            <td style="max-width: 250px;">
                                                <span class="text-muted">
                                                    {{ Str::limit($review->comments, 60) }}
                                                </span>
                                            </td>

                                            <!-- Rating -->
                                            <td>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <i class="fas fa-star text-warning"></i>
                                                    @else
                                                        <i class="far fa-star text-muted"></i>
                                                    @endif
                                                @endfor

                                                <div>
                                                    <small class="text-muted">
                                                        ({{ $review->rating }}/5)
                                                    </small>
                                                </div>
                                            </td>

                                            <!-- Action -->
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">

                                                    <a href="{{ url('/manage/review-edit/' . $review->id) }}"
                                                        class="btn btn-sm btn-primary">

                                                        <i class="fas fa-edit"></i>
                                                        Edit
                                                    </a>

                                                    <a href="{{ url('/manage/review-delete/' . $review->id) }}"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this review?')">

                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </a>

                                                </div>
                                            </td>

                                        </tr>

                                    @empty

                                        <tr>
                                            <td colspan="7" class="text-center py-5">

                                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>

                                                <h5 class="text-muted">
                                                    No Reviews Found
                                                </h5>

                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
