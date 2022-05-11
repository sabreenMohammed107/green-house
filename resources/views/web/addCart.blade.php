@extends('web.layout.web')

@section('content')

<section class="home-slider owl-carousel" style="max-height:500px !important;overflow:hidden">
    <div class="slider-item" style="background-image:url({{ asset('webassets/imgs/bg-5.jpg') }});">
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 bread">Confirmation</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Confirmation/span></p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftc-no-pb">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-2 p-md-5 img img-2 d-flex justify-content-center align-items-center order-md-last">
                <img src="{{ asset('webassets/imgs/10.jpg')}}" />
            </div>
            <div class="col-md-10 wrap-about ftco-animate">
                <div class="heading-section mb-5 pl-md-5">
                    <div class="pr-md-5 mr-md-5 text-md-left">
                        <span class="subheading">Company Confirmation</span>
                        <h2 class="mb-4">Your Item Added To Cart Succefully</h2>
                        <!--<p>Cash out your Points whenever you want for your favorite gift card or get a transfer to your PayPal account.</p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

