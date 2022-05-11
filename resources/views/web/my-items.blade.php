@extends('web.layout.web')

@section('content')
    <section class="home-slider owl-carousel" style="max-height:500px !important;overflow:hidden">
        <div class="slider-item" style="background-image:url({{ asset('webassets/imgs/bg-5.jpg') }});">
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 bread">My Items</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>My
                                Items</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (count($errors) > 0)
    <div class="col-lg-12" style="direction: rtl;">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

 @if(Session::has('flash_success'))
    <div class="col-lg-12" style="direction: rtl;">
        <div class="alert alert-success">
            <strong><i class="fa fa-check-circle"></i> {!! session('flash_success') !!}</strong>
        </div>
    </div>
@endif

@if(Session::has('flash_danger'))
    <div class="col-lg-12" style="direction: rtl;">
        <div class="alert alert-danger">
            <strong><i class="fa fa-info-circle"></i> {!! session('flash_danger') !!}</strong>
        </div>
    </div>
@endif

@if(Session::has('flash_delete'))
    @section('script')
    Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
    )
    @endsection
@endif

    <section class="mt-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Items</span>
                    <h2 class="mb-4">My Items</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-12 heading-section ftco-animate text-center">
                    <div class="table-responsive">
                        <div class="form-group text-right">
                            <a href="{{ route('my-items.create') }}" class="btn btn-primary py-3 px-5"> Add New Item </a>
                        </div>
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Desc</th>
                                    <th>LinK</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>
                                            <div class="product-img">
                                                <div class="img-prdct"><img
                                                        src="{{ asset('uploads/items') }}/{{ $item->image ?? '' }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{ $item->name ?? '' }}</p>
                                        </td>
                                        <td>
                                            {{-- <p>{{ $item->description ?? '' }}</p> --}}
                                        </td>
                                        <td>
                                            <a href="{{ $item->vedio_url ?? '#' }}">{{ $item->vedio_url ?? '' }}</a>
                                        </td>
                                        <td>
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a class="btn btn-success" title="view"
                                                    href="{{ route('my-items.show', $item->id) }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a class="btn btn-success" title="edit"
                                                    href="{{ route('my-items.edit', $item->id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>

                                                 <form id="form-id{{$item->id}}" action="{{ route('my-items.destroy', $item->id) }}" style="display: none"  method="POST" >
                                                    @csrf
                                                    @method('DELETE')

                                                 </form>
                                                 <button type="button" class="btn btn-success" onclick="document.getElementById('form-id{{$item->id}}').submit();" title="delete"><i class="fa-solid fa-trash"></i></button>
                                                 <a class="btn btn-success" title="cart"
                                                 href="{{ route('items-cart', $item->id) }}">
                                                 <i class="fa-solid fa-cart-arrow-down"></i>
                                             </a>
                                            </div>



                                        </td>


                                    </tr>


                                @endforeach


                            </tbody>
                        </table>
                        <div class="form-group">
                            <a href="{{ route('my-items.create') }}" class="btn btn-primary py-3 px-5"> Add New Item </a>
                        </div>
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
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        @foreach ($items as $item)
                            <div class="item">
                                <div class="testimony-wrap">
                                    <div class="blog-entry box-shadow2">
                                        <a href="blog-single.html" class="block-20"
                                            style="background-image: url('{{ asset('uploads/items') }}/{{ $item->image ?? '' }}');">
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
