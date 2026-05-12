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
                        <h3 class="mb-0">Edit Policy Data</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Policy Data</li>
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
                <div class="row g-4">
                    <!--begin::Col-->
                    <div class="col-md-12">
                        <!--begin::Quick Example-->
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Input Policy Data</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <form action="{{url('/manage/website-policy/update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="privacy_policy" class="form-label">Privacy Policy</label>
                                        <textarea name="privacy_policy" class="form-control" id="privacy_policy" required>{{$policyData->privacy_policy}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="terms_conditions" class="form-label">Terms & Conditions</label>
                                        <textarea name="terms_conditions" class="form-control" id="terms_conditions" required>{{$policyData->terms_conditions}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="refund_policy" class="form-label">Refund Policy</label>
                                        <textarea name="refund_policy" class="form-control" id="refund_policy" required>{{$policyData->refund_policy}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="payment_policy" class="form-label">Payment Policy</label>
                                        <textarea name="payment_policy" class="form-control" id="payment_policy" required>{{$policyData->payment_policy}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="about_us" class="form-label">About Us</label>
                                        <textarea name="about_us" class="form-control" id="about_us" required>{{$policyData->about_us}}</textarea>
                                    </div>
                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                <!--end::Footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Quick Example-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#privacy_policy').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#terms_conditions').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#refund_policy').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#payment_policy').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#about_us').summernote();
        });
    </script>
@endpush