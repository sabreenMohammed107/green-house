@extends('web.layout.web')

@section('content')
<section class="home-slider owl-carousel" style="max-height:500px !important;overflow:hidden">
    <div class="slider-item" style="background-image:url({{ asset('webassets/imgs/bg-5.jpg') }});">
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 bread">Contact Us</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>Contact</span></p>
                </div>
            </div>
        </div>
    </div>
</section>
@if (session('error'))
<div class="alert alert-warning"></div>
<div class="col-lg-12">
    <div class="alert alert-success alert-block ">
    <button type="button" id="alertClose" class="close" data-dismiss="alert">×</button>
    <strong ><i class="fa fa-check-circle"></i> {{ session('error') }}</strong>
    </div>
</div>
@endif

<section class="ftco-section contact-section">
    <div class="container">

        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2>Contact Information</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-3">
                <p><i class="fa-solid fa-house mr-2"></i><span> Address </span> <br /> {{$companyContact->address}}</p>
            </div>
            <div class="col-md-3">
                <p><i class="fa-solid fa-phone mr-2"></i><span> Phone </span> <br /> {{$companyContact->phone}}</p>
            </div>
            <div class="col-md-3">
                <p><i class="fa-solid fa-envelope mr-2"></i><span> Email </span> <br /> {{$companyContact->email}}</p>
            </div>
            <div class="col-md-3">
                <p><i class="fa-solid fa-globe mr-2"></i><span> Website </span> <br />{{$companyContact->website}}</p>
            </div>
        </div>
        <div class="row block-9">
            <div class="col-md-6 pr-md-5">
                <form action="{{ url('/contact-messaging') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>

            <div class="col-md-6 d-flex">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="450" id="gmap_canvas" src="{{$companyContact->google_map}}"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123movies</a><br>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                height: 450px;
                                width: 100%;
                            }
                        </style><a href="https://www.embedgooglemap.net">google maps iframe code</a>
                        <style>
                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                height: 450px;
                                width: 100%;
                            }
                        </style>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


@endsection
