@extends('web.layout.web')

@section('content')
<section class="home-slider owl-carousel" style="max-height:500px !important;overflow:hidden">
    <div class="slider-item" style="background-image:url({{ asset('webassets/imgs/bg-5.jpg')}});">
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 bread">About</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>About</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftc-no-pb">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center order-md-last" style="background-image: url({{ asset('webassets/imgs/01.jpg')}});">
            </div>
            <div class="col-md-7 wrap-about ftco-animate">
                <div class="heading-section mb-5 pl-md-5">
                    <div class="pr-md-5 mr-md-5 text-md-left">
                        <span class="subheading">Company Help Intro</span>
                        <h2 class="mb-4">The People We Help</h2>
                    </div>
                </div>
                <div class="pr-md-5 pl-md-5 mr-md-5 mb-5">
                    <div class="services-wrap d-flex" dir="rtl">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="fa-solid fa-recycle"></span>
                        </div>
                        <div class="media-body pl-4 order-md-first text-md-right">
                            <h3 class="heading">Company Overview</h3>
                            <p>{!! $company->ocerview !!}</p>
                        </div>
                    </div>
                    <div class="services-wrap d-flex" dir="rtl">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="fa-solid fa-recycle"></span>
                        </div>
                        <div class="media-body pl-4 order-md-first text-md-right">
                            <h3 class="heading">Our Mission</h3>
                            <p>{!! $company->mission !!}</p>
                        </div>
                    </div>
                    <div class="services-wrap d-flex" dir="rtl">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="fa-solid fa-recycle"></span>
                        </div>
                        <div class="media-body pl-4 order-md-first text-md-right">
                            <h3 class="heading">Our Vision</h3>
                            <p>{!! $company->vision !!}</p>
                        </div>
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
                <span class="subheading">Testimony</span>
                <h2 class="mb-4">Our satisfied customer says</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts. Separated they live in</p>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    @foreach ($feedbacks as $feedback)
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url({{ asset('uploads/feedback') }}/{{ $feedback->image ?? '' }})">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">{{$feedback->feedback}}</p>
                                <p class="name">{{$feedback->name}}</p>
                                <span class="position">{{$feedback->position}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftc-no-pb ftc-no-pt bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-5">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="500" id="gmap_canvas"
                            src="{{$companyContact->google_map}}"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                            href="https://123movies-to.org">123movies</a><br>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                height: 500px;
                                width: 100%;
                            }

                        </style><a href="https://www.embedgooglemap.net">google maps iframe code</a>
                        <style>
                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                height: 500px;
                                width: 100%;
                            }

                        </style>
                    </div>
                </div>
            </div>
            <div class="col-md-7 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section mb-md-5 pl-md-5 mt-5 pt-3">
                    <div class="pl-md-5">
                        <span class="subheading">Contact Information</span>
                        <h2 class="mb-4">You may Contact Us here</h2>
                    </div>
                </div>
                <div class="pl-md-5 ml-md-5">
                    <div class="info-contact mb-5">
                        <p><span>Phone:</span> <span>{{$companyContact->phone}}</span></p>
                        <p><span>Fax:</span> <span>{{$companyContact->fax}}</span></p>
                        <p><span>E-Mail:</span> <span><a href="#">{{$companyContact->email}}</a></span></p>
                    </div>
                    <div class="info-contact mb-5">
                        <h3>Address Information</h3>
                        <p><span>Address</span> <span> {{$companyContact->address}}</span></p>
                        <p><span>Fax:</span> <span>{{$companyContact->fax}}</span></p>
                        <p><span>E-Mail:</span> <span><a href="#">{{$companyContact->email}}</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
