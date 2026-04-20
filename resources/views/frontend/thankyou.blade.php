@extends('frontend.master')

@section('content')
    <main>
        <div class="thank-you-wrapper" style="position: relative;">
            <div class="js-container" style="height: 100vh;"></div>
            <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);text-align: center;max-width: 750px;">
                <div class="checkmark-circle">
                    <div class="background"></div>
                    <div class="checkmark draw"></div>
                </div>
                <h3 class="py-3">অর্ডার নম্বর : 102</h3>
                <p class="thank-you-message">
                    আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে ।আমাদের কল সেন্টার থেকে ফোন করে আপনার অর্ডারটি কনফার্ম করা হবে
                </p>
                <a href="index.html" class="thank-you-btn-inner">Go To Home</a>
            </div>
        </div>
	</main>

@endsection