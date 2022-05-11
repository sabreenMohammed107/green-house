@extends('web.layout.web')
@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  @endsection
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
                <h2 class="mb-4">Order Details</h2>
                <h6>
                    <b>Order Status :</b>{{$order->status->status ?? ''}}
                </h6>
                <h6>
                    <b>Order Date :</b> {{date('d-m-Y', strtotime($order->order_date))}}
                </h6>
                <h6>
                    <b>Order No :</b> {{$order->id}}
                </h6>
            </div>
        </div>
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-12 heading-section ftco-animate text-center">
                <div class="table-responsive">
                    <h5 class="text-left pb-3">
                        <b>Order Items Details :</b>
                    </h5>
                    <table id="myTable" class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Points</th>
                                <th class="text-right"><span id="amount" class="amount">Total Points</span> </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($order->order_items as $row)
                            <tr>
                                <td>
                                    <div class="product-img">
                                        <div class="img-prdct"><img src="{{ asset('uploads/items') }}/{{ $row->item->image ?? '' }}"></div>
                                    </div>
                                </td>
                                <td>
                                    <p>{{ $row->item->name ?? '' }}</p>
                                </td>
                                <td>
                                    {{ $row->quantity}}
                                </td>
                                <td>
                                    {{ $row->points_done}}
                                </td>
                                <td align="right"> {{ $row->quantity * $row->points_done}}</td>
                            </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4"></th>
                                <th  align="right" style="text-align: right"></th>

                            </tr>
                        </tfoot>
                        {{-- <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td align="right"><strong>TOTAL = <i class="fa-solid fa-coins"></i>  </strong></td>
                            </tr>
                        </tfoot> --}}
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
@section('scripts')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api();

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            // Total over all pages
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $( api.column( 4 ).footer() ).html(
                'TOTAL = <i class="fa-solid fa-coins"></i> '+pageTotal
            );
        }
    } );
} );
    </script>
@endsection
