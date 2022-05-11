@extends('web.layout.web')

@section('content')

<section class="home-slider owl-carousel" style="max-height:500px !important;overflow:hidden">
    <div class="slider-item" style="background-image:url({{ asset('webassets/imgs/bg-5.jpg') }});">
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 bread">Cart</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-5">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Cart</span>
                <h2 class="mb-4">My Cart</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
            </div>
        </div>
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-12 heading-section ftco-animate text-center">
                <div class="table-responsive">
                    <table id="myTable" class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Qty</th>
                                  <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody id="rows">
                           @include('web.mycartTable')
                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <td colspan="5"></td>
                                <td align="right"><strong>TOTAL = <i class="fa-solid fa-coins"></i>  <span id="total" class="total">0</span></strong></td>
                            </tr>
                        </tfoot> --}}
                    </table>
                    <form action="{{ url('/place-order') }}" method="post">
                        @csrf
                        <input type="hidden" name="order_id" @isset($order)
                        value="{{$order->id}}"
                        @endisset >
                    <div class="form-group">
                        <input type="submit" value="Place Order" class="btn btn-primary py-3 px-5">
                    </div>
                    </form>
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
<script>
    function plusing(id){
        var item_id=$('#cart'+id).val();

        var ajaxURL = '{{ route('addQty/fetch') }}';
        $.ajax({
                    type: 'GET',
                    async: false,
                    data: {
                        item_id: item_id,


                    },
                    url: ajaxURL,

                    success: function(data) {

                        $('#rows').html(data);



                    },

                    error: function(request, status, error) {


                    }
                });
    }


    function minsing(id){
        var item_id=$('#cart'+id).val();


        $.ajax({
                    type: 'GET',
                    async: false,
                    data: {
                        item_id: item_id,


                    },
                    url: "{{ url('subQty/fetch') }}",

                    success: function(data) {

                        $('#rows').html(data);



                    },

                    error: function(request, status, error) {


                    }
                });
    }


    function del(id){
        var item_id=$('#cart'+id).val();


        $.ajax({
                    type: 'GET',
                    async: false,
                    data: {
                        item_id: item_id,


                    },
                    url: "{{ url('del/orderItem') }}",

                    success: function(data) {

                        $('#rows').html(data);


                    },

                    error: function(request, status, error) {


                    }
                });
    }
</script>
@endsection
