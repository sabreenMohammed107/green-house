@extends('web.layout.web')

@section('content')
    <section class="home-slider owl-carousel" style="max-height:500px !important;overflow:hidden">
        <div class="slider-item" style="background-image:url({{ asset('webassets/imgs/bg-5.jpg') }});">
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 bread">How To Use</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span>
                            <span>How To Use</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">How To Use</span>
                <h2 class="mb-4">How To Use</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
                    blind texts. Separated they live in</p>
            </div>
        </div>
        <div class="container">
            <ul class="timeline">
                @foreach ($uses as $index=>$use )



                <li  @if ($index % 2) class="timeline-inverted" @endif>
                    <div class="timeline-badge">
                        <i class="fa fa-{{$index+1}}"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h5 class="timeline-title">{{$use->title}}</h5>
                            <p>
                                <small class="text-muted">
                                    <i class="fa fa-clock-o"></i>
                                    {{ Carbon\Carbon::parse($use->use_date)->diffForHumans()}} {{$use->sub_title}}
                                </small>
                            </p>
                        </div>
                        <div class="timeline-body">
                            <p>{{$use->text}}</p>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
    </section>
@endsection
