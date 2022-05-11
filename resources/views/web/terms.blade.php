@extends('web.layout.web')

@section('content')
<section class="home-slider owl-carousel" style="max-height:500px !important;overflow:hidden">
    <div class="slider-item" style="background-image:url({{ asset('webassets/imgs/bg-5.jpg') }});" >
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 bread">Terms & Conditions</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>Terms & Conditions</span></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Terms & Conditions</span>
                <h2 class="mb-4">Terms & Conditions</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
            </div>
        </div>
        <div class="header-offset content-wrapper about-wrapper">
            <div class="terms-container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <div class="terms-body">
                            <h3>General</h3>
                            <p>
                                By using our website, you agree to the Terms of Use. We may change or update these terms so please check this page regularly. We do not represent or warrant that the information on our web site is accurate, complete, or current. This includes pricing
                                and availability information. We reserve the right to correct any errors or omissions, and to change or update information at any time without giving prior notice.
                            </p>
                            <hr>
                            <h3>Correction of Errors and Inaccuracies</h3>
                            <p>
                                The information on the site may contain typographical errors or inaccuracies and may not be complete or current. The Main Label therefore reserves the right to correct any errors, inaccuracies or omissions and to change or update information at any time
                                with or without prior notice (including after you have submitted your order). Please note that such errors, inaccuracies or omissions may relate to product description, pricing, product availability, or otherwise.
                            </p>
                            <hr>
                            <h3>Tax</h3>
                            <p>
                                As a seller, you are responsible for collecting and paying taxes associated with any profits made through The Main Label. The Main Label will issue 1099-K forms to all sellers in the United States who receive more than $600.00 or $2,000.00 in profits
                                to comply with IRS requirements. All forms will be mailed to the address you’ve indicated in your profile by January 31 for the previous year.
                            </p>

                            <hr>
                            <h3>Return Policy</h3>
                            <p>
                                Since we only manufacture what is ordered, The Main Label does not accept returns or exchanges at this time. All instant purchases should be discussed directly with the seller you purchased from as they are responsible for their own shop policies. If
                                you are unhappy with your order for any reason at all, please contact The Main Label at <a href="email">customerservice@HTI-Team.com</a> and we’ll work with you to make it right.
                                We will not accept any packages sent without authorization, any shipments received that have not been authorized will be refused/shipped back. Please make sure that you have carefully reviewed your order prior to finalizing
                                your purchase.
                            </p>
                            <hr>
                            <h3>Cancellations </h3>
                            <p>
                                If you decide that you no longer want your order for any reason you may cancel it as long as the campaign period is still active. However, once a campaign ends, we are unable to cancel an order as the information has already been sent to the printer for
                                manufacturing and fulfillment.
                            </p>
                            <hr>
                            <h3>Colors</h3>
                            <p>
                                We have made the strongest of efforts to display all product colors that appear on the Site as accurately as possible. However, as the actual colors you see will depend on your monitor and/or other technological circumstance, we cannot and do not guarantee
                                that your monitor's display of any color will be accurate.
                            </p>
                            <hr>
                            <h3>Product Availability</h3>
                            <p>Although availability may be indicated on our site, we cannot guarantee product availability or immediate delivery. We reserve the right, without liability or prior notice to revise, discontinue, or cease to make available
                                any or all products or to cancel any order.</p>
                            <hr>
                            <h3>Shipping & Delivery</h3>
                            <p>
                                For all orders within North America, please allow approximately 14 business days from the time a campaign ends (please note this is different from the time of purchase) to receive your order. For all international orders, please allow approximately 21
                                business days from the time a campaign ends (please note this is different from the time of purchase) to receive your order. You will receive an email from The Main Label when your order has been confirmed. If you still
                                have not received your purchase after the above mentioned times, please notify <a href="email">customerservice@HTI-Team.com</a>.

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        </main>

    </div>
</section>


@endsection
