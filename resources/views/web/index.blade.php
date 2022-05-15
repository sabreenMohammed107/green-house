@extends('web.layout.web')

@section('content')
    <section class="home-slider js-fullheight owl-carousel">
        @foreach ($homeSliders as $homeSlider)
            <div class="slider-item js-fullheight"
                style="background-image:url({{ asset('uploads/slider_images') }}/{{ $homeSlider->image ?? '' }});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end"
                        data-scrollax-parent="true">
                        <div class="col-md-7 text ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                                {!! $homeSlider->title ?? '' !!}</h1>
                            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> {!! $homeSlider->text ?? '' !!}</p>
                            <p><a href="{{ url('/contact') }}" class="btn btn-white btn-outline-white px-4 py-3 mt-3">Contact US</a></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </section>

    <section class="ftco-section ftco-services">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-4 mb-5">
                    <form class="getaquote-form" action="{{ url('/contact-message') }}" method="post">
                        @csrf
                        <h3>Send Us Now</h3>
                        <div class="wrap">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <div class="row pl-md-4">
                        @isset($categories[0])
                            <div class="col-lg-6 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="fa fa-tv"></span>
                                    </div>
                                    <div class="media-body pl-4">
                                        <h3 class="heading"> {!! $categories[0]->name !!}</h3>
                                        <p> {!! $categories[0]->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        @isset($categories[1])
                            <div class="col-lg-6 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="fa-regular fa-keyboard"></span>
                                    </div>
                                    <div class="media-body pl-4">
                                        <h3 class="heading"> {!! $categories[1]->name !!}</h3>
                                        <p> {!! $categories[1]->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        @isset($categories[2])
                            <div class="col-lg-6 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="fa-solid fa-dice"></span>
                                    </div>
                                    <div class="media-body pl-4">
                                        <h3 class="heading"> {!! $categories[2]->name !!}</h3>
                                        <p> {!! $categories[2]->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        @isset($categories[3])
                            <div class="col-lg-6 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="fa-solid fa-mobile-screen-button"></span>
                                    </div>
                                    <div class="media-body pl-4">
                                        <h3 class="heading"> {!! $categories[3]->name !!}</h3>
                                        <p> {!! $categories[3]->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>

            @if (Session::has('flash_success'))
                <div class="col-lg-12">
                    <div class="alert alert-success alert-block ">
                        <button type="button" id="alertClose" class="close" data-dismiss="alert">×</button>
                        <strong><i class="fa fa-check-circle"></i> {{ session('flash_success') }}</strong>
                    </div>
                </div>
            @endif
            @if (Session::has('flash_danger'))
                <div class="col-lg-12">
                    <div class="alert alert-danger alert-block ">
                        <button type="button" id="alertClose" class="close" data-dismiss="alert">×</button>
                        <strong><i class="fa fa-info-circle"></i> {{ session('flash_danger') }}</strong>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section class="ftco-section ftc-no-pb">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center">
                    <iframe width="853" height="480" src="{{ $company->company_vedio }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <!--<a href="" target="iframe1" class="d-flex justify-content-center align-items-center">
                            <span class="fa-solid fa-play"></span>
                        </a>-->
                </div>

                <div class="col-md-7 wrap-about pb-md-5 ftco-animate">
                    <div class="heading-section mb-5 pl-md-5">
                        <div class="pl-md-5">
                            <span class="subheading">Company Overview</span>
                            <h2 class="mb-4">Learned About Recycle</h2>
                        </div>
                    </div>
                    <div class="pl-md-5 ml-md-5 mb-5">
                        <p>{!! $company->ocerview !!} </p><a href="{{ url('/about') }}" class="btn-custom hvr-skew-forward">Learn More
                            <span class="ion-ios-arrow-forward"></span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter"
        style="background-image: url({{ asset('webassets/imgs/bg-1.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-md-flex align-items-center">
                <div class="col-lg-4">
                    <div class="heading-section pl-md-5 heading-section-white">
                        <div class="ftco-animate">
                            <span class="subheading">Some</span>
                            <h2 class="mb-4">Interesting Facts</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row d-md-flex align-items-center">
                        @foreach ($counters as $counter)
                            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text">
                                        <strong class="number"
                                            data-number="{{ $counter->counter_value }}">0</strong>
                                        <span>{{ $counter->counter_text }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftc-no-pb">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center order-md-last"
                    style="background-image: url({{ asset('webassets/imgs/01.jpg') }});border-radius:.3rem">
                </div>
                <div class="col-md-7 wrap-about ftco-animate">
                    <div class="heading-section mb-5 pl-md-5">
                        <div class="pr-md-5 mr-md-5">
                            <span class="subheading">Company Help Intro</span>
                            <h2 class="mb-4">What Can I Recycle?</h2>
                        </div>
                    </div>
                    <div class="pr-md-5 pl-md-5 mr-md-5 mb-5">
                        <div class="services-wrap d-flex">
                            <div class="media block-6 services d-flex">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="fa fa-tv"></span>
                                </div>
                                <div class="media-body pl-4">
                                    <h3 class="heading"> {!! $categories[0]->name !!}</h3>
                                        <p> {!! $categories[0]->description !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="services-wrap d-flex">
                            <div class="media block-6 services d-flex">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="fa-solid fa-tty"></span>
                                </div>
                                <div class="media-body pl-4">
                                    <h3 class="heading"> {!! $categories[1]->name !!}</h3>
                                        <p> {!! $categories[1]->description !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="services-wrap d-flex">
                            <div class="media block-6 services d-flex">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="fa-solid fa-mobile-screen-button"></span>
                                </div>
                                <div class="media-body pl-4">
                                    <h3 class="heading"> {!! $categories[2]->name !!}</h3>
                                        <p> {!! $categories[2]->description !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="services-wrap d-flex">
                            <div class="media block-6 services d-flex">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="fa-solid fa-headphones-simple"></span>
                                </div>
                                <div class="media-body pl-4">
                                    <h3 class="heading"> {!! $categories[3]->name !!}</h3>
                                        <p> {!! $categories[3]->description !!}</p>
                                </div>
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

    <section class="ftco-section" style="background-image: url({{ asset('webassets/imgs/bg-3.jpg')}});border-radius:.3rem">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Working Process</span>
                    <h2 class="mb-4 text-white">Our Working Way</h2>
                    <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row steps d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="step d-flex align-self-stretch box-shadow">
                        <span>#01</span>
                        <h3>Download & Login</h3>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="step d-flex align-self-stretch box-shadow">
                        <span>#02</span>
                        <h3>Choose a Category</h3>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="step d-flex align-self-stretch box-shadow">
                        <span>#03</span>
                        <h3>Choose Location</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-12 heading-section ftco-animate">
                    <span class="subheading">Our latest update</span>
                    <h2 class="mb-4">Our Blog</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry box-shadow2">
                        <span class="block-20" style="background-image: url('{{ asset('uploads/blogs') }}/{{ $blog->image ?? '' }}');">
                        </span>
                        <div class="text d-flex py-4">
                            <div class="meta mb-3">
                                <div><a href="#">{{date('Y-m-d', strtotime($blog->blog_date))}}</a></div>
                                {{-- <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="fa-solid fa-comment-dots"></span>
                                        3</a></div> --}}
                            </div>
                            <div class="desc pl-3">
                                <h3 class="heading">{!! str_limit($blog->text ?? '', $limit = 100, $end = '...') !!}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


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
