@extends('customer.master')

@section('content')
     <div class="body flex-grow-1">
        <div class="container-lg px-4">
            <form action="{{url('/customer/profile-update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    
                    <input type="text" name="name" class="form-control" value="{{$authUser->name}}" placeholder="Your Name*" aria-label="Username"
                        aria-describedby="basic-addon1" required>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="phone" value="{{$authUser->phone}}" class="form-control" placeholder="Your phone">
                </div>

                <div class="input-group mb-3">
                    <input type="file" name="image" class="form-control">
                </div>
                @if ($authUser->image != null)
                    <img src="{{$authUser->image}}" width="100" height="100">
                @else
                    <img src="{{asset('customer/user/user.png')}}" width="100" height="100">
                @endif

                <div class="input-group mt-3">
                    <input type="submit" name="submit" id="submit" class="form-control btn btn-success text-white">
                </div>

            </form>
        </div>
    </div>
@endsection