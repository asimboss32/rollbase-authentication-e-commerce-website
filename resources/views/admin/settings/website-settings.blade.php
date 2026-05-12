@extends('admin.master')

@section('content')
<main class="app-main">

    <div class="app-content-header py-2">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold">Website Settings</h5>
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Settings</li>
            </ol>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="card border-0 shadow-sm">
                <form action="{{ url('/manage/website-settings/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body py-3 px-3">

                        <!-- Contact -->
                        <div class="mb-3">
                            <small class="text-muted fw-semibold">Contact Info</small>
                            <div class="row g-2 mt-1">
                                <div class="col-md-4">
                                    <input type="text" name="phone" class="form-control form-control-sm" value="{{$generalSettins->phone}}" placeholder="Phone">
                                </div>
                                <div class="col-md-4">
                                    <input type="email" name="email" class="form-control form-control-sm" value="{{$generalSettins->email}}" placeholder="Email">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="address" class="form-control form-control-sm" value="{{$generalSettins->address}}" placeholder="Address">
                                </div>
                            </div>
                        </div>

                        <!-- Social -->
                        <div class="mb-3">
                            <small class="text-muted fw-semibold">Social Links</small>
                            <div class="row g-2 mt-1">
                                <div class="col-md-3">
                                    <input type="url" name="facebook" class="form-control form-control-sm" value="{{$generalSettins->facebook}}" placeholder="Facebook">
                                </div>
                                <div class="col-md-3">
                                    <input type="url" name="twitter" class="form-control form-control-sm" value="{{$generalSettins->twitter}}" placeholder="Twitter">
                                </div>
                                <div class="col-md-3">
                                    <input type="url" name="instagram" class="form-control form-control-sm" value="{{$generalSettins->instagram}}" placeholder="Instagram">
                                </div>
                                <div class="col-md-3">
                                    <input type="url" name="youtube" class="form-control form-control-sm" value="{{$generalSettins->youtube}}" placeholder="YouTube">
                                </div>
                            </div>
                        </div>

                        <!-- Media -->
                        <div>
                            <small class="text-muted fw-semibold">Media</small>
                            <div class="row g-3 mt-1 align-items-center">

                                <!-- Logo -->
                                <div class="col-md-6 d-flex align-items-center gap-3">
                                    <img id="logoPreview" src="{{ $generalSettins->logo }}" class="rounded border" width="120">
                                    <input type="file" name="logo" class="form-control form-control-sm" onchange="previewImage(event,'logoPreview')">
                                </div>

                                <!-- Hero -->
                                <div class="col-md-6">
                                    <input type="file" name="hero_image" class="form-control form-control-sm mb-2" onchange="previewImage(event,'heroPreview')">
                                    <img id="heroPreview" src="{{ $generalSettins->hero_image }}" class="rounded border w-100">
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="card-footer py-2 px-3 text-end bg-white border-top-0">
                        <button class="btn btn-sm btn-dark px-3">
                            Save Changes
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</main>

<script>
function previewImage(event, id){
    const reader = new FileReader();
    reader.onload = () => document.getElementById(id).src = reader.result;
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection