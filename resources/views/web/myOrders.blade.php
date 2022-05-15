@extends('web.layout.web')

@section('content')

<section class="home-slider owl-carousel" style="max-height:500px !important;overflow:hidden">
    <div class="slider-item" style="background-image:url({{ asset('webassets/imgs/bg-5.jpg') }});">
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 bread">My Orders</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="">Home</a></span> <span>My Orders</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-5">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Orders</span>
                <h2 class="mb-4">My Orders</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
            </div>
        </div>
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-12 heading-section ftco-animate text-center">
                <div class="table-responsive">
                    <table id="myTable" class="table">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Order Status</th>
                                <th>Order Date</th>
                                <th>Order Points</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($orders as $index=>$order)
                            <tr>
                                <td>
                                    <p>{{$index+1}}</p>
                                </td>
                                <td>
                                    <p>{{$order->status->status ?? ''}}</p>
                                </td>
                                <td>
                                    <p>{{date('d-m-Y', strtotime($order->order_date))}}</p>
                                </td>
                                <td>
                                    <?php

                                    $points_done=App\Models\Order_item::where('order_id', $order->id)->sum(\DB::raw('quantity*points_done'));

                                   ?>
                                    <p>
                                        {{$points_done}}
                                  </p>
                                </td>
                                <td>
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                        <a href="{{ route('order_details', $order->id) }}" class="btn btn-success" title="view"><i class="fa-solid fa-eye"></i> order details</a>
                                    </div>
                                    @if($order->status_id == 1)
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                        <a href="{{ route('order_confirming', $order->id) }}" class="btn btn-success" title="view"><i class="fa-solid fa-check"></i> Confirm  </a>
                                    </div>
                                    @endif
                                    @if($order->status_id == 1)
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                        <a href="{{ route('order_rejecting', $order->id) }}" class="btn btn-danger" title="view"><i class="fa-solid fa-xmark"></i> Reject  </a>
                                    </div>
                                    @endif
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

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-12 heading-section ftco-animate">
                <span class="subheading">Your latest Items</span>
                <h2 class="mb-4">Your Items Data</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    @foreach ($items as $item)
                    <div class="item">
                        <div class="testimony-wrap">
                            <div class="blog-entry box-shadow2">
                                <a href="blog-single.html" class="block-20" style="background-image: url('{{ asset('uploads/items') }}/{{ $item->image ?? '' }}');">
                                </a>
                                <div class="text d-flex">
                                    <div class="items-card-text">
                                        <h3 class="heading"><a href="#">{{ $item->name ?? '' }}</a></h3>
                                        {{-- <p>{{ $item->description ?? '' }}</p> --}}
                                        <a href="">More Details <i class="fa-solid fa-angles-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>




@endsection
