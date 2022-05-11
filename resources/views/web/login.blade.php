@extends('web.layout.web')

@section('content')
<section class="home-slider owl-carousel" style="max-height:500px !important;overflow:hidden">
    <div class="slider-item" style="background-image:url({{ asset('webassets/imgs/bg-5.jpg') }});" >
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 bread">Login</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>Login</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec-login">
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <img class="login-logo" src="{{ asset('webassets/imgs/logo.png')}}" />
                <form class="login" action="{{ route('save-user') }}" method="post">
                    @csrf

                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input " name="email" value="{{ old('email') }}" placeholder="Email">


            </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input " name="password" placeholder="Password">

                    </div>
                    <button class="button login__submit" type="submit">
                                <span class="button__text">Login Now</span>
                                <i class="button__icon fas fa-chevron-right"></i>
                            </button>
                </form>
                <div class="social-login">
                    <h4 class="text-white">                  </h4>
                    <div class="social-icons">
                        <a href="{{url('/user-register')}}" style="padding: 0px 10px;
                        color: #fff;
                        text-decoration: underline;
                        text-shadow: 0px 0px 8px #7875b5;"> Sign Up </a>
                        {{-- <a href="#" class="social-login__icon fab fa-instagram"></a>
                        <a href="#" class="social-login__icon fab fa-facebook"></a>
                        <a href="#" class="social-login__icon fab fa-twitter"></a> --}}
                    </div>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>

</section>

@endsection
