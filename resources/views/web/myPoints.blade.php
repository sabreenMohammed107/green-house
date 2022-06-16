@extends('web.layout.web')

@section('content')

<section class="home-slider owl-carousel" style="max-height:500px !important;overflow:hidden">
    <div class="slider-item" style="background-image:url({{ asset('webassets/imgs/bg-5.jpg') }});">
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 bread">My Points</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>My Points</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftc-no-pb">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4 p-md-5 img img-2 d-flex justify-content-center align-items-center order-md-last">
                <img src="{{ asset('webassets/imgs/gift-cards-v2.png')}}" />
            </div>
            <div class="col-md-8 wrap-about ftco-animate">
                <div class="heading-section mb-5 pl-md-5">
                    <div class="pr-md-5 mr-md-5 text-md-left">
                        <span class="subheading">Company Points Intro</span>
                        <h2 class="mb-4">Redeem your Points for Gift Cards & More</h2>
                        <p>Cash out your Points whenever you want for your favorite gift card or get a transfer to your PayPal account.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">My Points</span>
                <h2 class="mb-4">Your Current Points :  {{Auth::user()->current}} Points</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
            </div>
        </div>
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-12 heading-section ftco-animate text-center">
                <div class="table-responsive">
                    <table id="myTable" class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Geft</th>
                                <th>Points</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($points as $point)
                            <tr>
                                <td>
                                    <div class="product-img">
                                        <div class="img-prdct2"><img src="{{ asset('uploads/points') }}/{{ $point->image ?? '' }}"></div>
                                    </div>
                                </td>
                                <td>
                                    <p>{{ $point->name ?? '' }}</p>
                                </td>
                                <td>
                                    <p>{{ $point->points ?? '' }}</p>
                                </td>
                                <td>
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                         <a class="btn btn-success" title="cart"
                                        href="{{ route('get-point', $point->id) }}">
                                        <i class="fa-solid fa-cart-arrow-down"></i>
                                        Get Now
                                    </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-12 heading-section ftco-animate">
                <span class="subheading">Your Previous Points</span>
                <h2 class="mb-4">Previous Points</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
            </div>
        </div>
        <div class="row">
            @foreach ($previ_pints as $prev)
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry box-shadow2">
                    <a href="blog-single.html" class="block-20" style="background-image: url('{{ asset('uploads/points') }}/{{ $prev->prize->image ?? '' }}');">
                    </a>
                    <div class="text d-flex py-4">
                        <div class="meta mb-3">
                            <div><a href="#">{{date('d-m-Y', strtotime($prev->confirm_date))}}</a></div>
                            <div><a href="#">{{ $prev->prize->name ?? '' }} - {{ $point->points ?? '' }} point</a></div>
                        </div>
                        <div class="desc pl-3">
                            <h3 class="heading"><a href="#">{{ $prev->prize->description ?? '' }}</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>



@endsection
