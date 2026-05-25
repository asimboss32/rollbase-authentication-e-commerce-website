@extends('frontend.master')

@section('content')
    <main>
        <section class="privacy-policy-section">
            <div class="privacy-policy-heading-wrapper">
                <div class="section-heading-outer">
                    <h4 class="section-heading-inner">
                        Payment Policy
                    </h4>
                </div>
            </div>
            <div class="container">
                <div class="privacy-policy-content">
                    <div class="contant-des">
                        {!! $paymentPolicy->payment_policy !!}
                    </div>
                </div>
            </div>
        </section>      
	</main>
@endsection