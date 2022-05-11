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
    <section class="mt-5">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Items</span>
                    <h2 class="mb-4">Show Item Data</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-12 heading-section ftco-animate text-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 form-left heading-section ftco-animate text-center pl-5 pr-5">
                            <div class="">
                                <h1> Show Item </h1>
                                <p> Feel free to drop us a line below!</p>
                                <form action="{{ route('my-items.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @method('PUT')
                                    <h3>Show It Now</h3>
                                    <div class="wrap">
                                        <div class="form-group">
                                            <input type="text" readonly name="name" value="{{$row->name}}" class="form-control" placeholder="Item Title">
                                        </div>
                                        <div class="form-group">
                                            <select name="category_id" disabled  class="form-control">
                                                <option value="">type</option>
                                                @foreach ($categories as $cat)
                                                <option value="{{$cat->id}}"  {{ $cat->id == $row->category_id  ? 'selected' : '' }}>{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input readonly type="url" name="vedio_url" value="{{$row->vedio_url}}"  class="form-control" placeholder="Youtube Link">
                                        </div>
                                        <div class="form-group">
                                            <textarea readonly name="description" id="" cols="30" rows="7" class="form-control" placeholder="Item Description">{{$row->description}}</textarea>
                                        </div>
                                        {{-- <div class="form-group">
                                            <div class="upload__box">
                                                <div class="upload__btn-box">
                                                    <label class="upload__btn">
														<span>Upload Images</span>
														<input type="file" disabled name="image"  data-max_length="20" class="upload__inputfile">
													</label>
                                                    <label
                                                    for="inputGroupFile02">{{ $row->image ?? '' }}</label>
                                                </div>
                                                <div class="upload__img-wrap"></div>

                                            </div>


                                            </div> --}}
                                        </div>
                                        <div class="form-group">
                                            {{-- <input type="submit" value="Save" class="btn btn-primary py-3 px-5"> --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
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
