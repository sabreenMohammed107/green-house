
    <footer class="ftco-footer ftco-bg-dark">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">GREEN HOUSE</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                            <li class="ftco-animate hvr-icon-rotate"><a href="{{$companyContact->twitter}}" class="hvr-icon"><span class="fa-brands fa-twitter"></span></a></li>
                            <li class="ftco-animate hvr-icon-rotate"><a href="{{$companyContact->facebook}}" class="hvr-icon"><span class="fa-brands fa-facebook-f"></span></a></li>
                            <li class="ftco-animate hvr-icon-rotate"><a href="{{$companyContact->instagram}}" class="hvr-icon"><span class="fa-brands fa-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Usefull Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('/how-use')}}">How to use</a></li>
                            <li><a href="{{url('/partners')}}">Our Partners</a></li>
                            <li><a href="{{url('/terms-conditions')}}">Terms of Use</a></li>
                            <li><a href="#">Privacy & Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Quick Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/about')}}">About Us</a></li>
                            <li><a href="#">Practice Areas</a></li>
                            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon fa-solid fa-location-dot"></span><span class="text">{{$companyContact->address}}</span></li>
                                <li><a href="#"><span class="icon fa-solid fa-phone"></span><span class="text">{{$companyContact->phone}}</span></a></li>
                                <li><a href="#"><span class="icon fa-solid fa-envelope"></span><span class="text">{{$companyContact->email}}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This website is made with <i class="fa-solid fa-heart" aria-hidden="true"></i> by <a href="" target="_blank">HTI Team</a></p>
                </div>
            </div> -->
        </div>
    </footer>

