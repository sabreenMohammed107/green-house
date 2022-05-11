@extends('layout.web')

@section('title', ' النقاط')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">اضافة</h3>
        </div>





                  <form action="{{route('admin-points.store')}}" method="POST" enctype="multipart/form-data">

				  @csrf
                  <div class="box-body">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('  الاسم  ') }}</label>
                                <input type="text" id="newTitle" name="name" value="{{old('name')}}" class="form-control"
                                   placeholder=" الاسم">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __('النقاط ') }}</label>
                                    <input type="text" id="newTitle" name="points" value="{{old('points')}}" class="form-control"
                                       placeholder=" الاسم">
                                </div>
                            </div>
                <hr>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('   الوصف') }}</label>
                            <textarea class="form-control " name="description">{{old('description')}}</textarea>


                        </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label  >{{ __('الترتيب ') }}</label>
                            <input type="number" id="newTitle" name="order" value="{{old('order')}}" class="form-control"
                               placeholder=" الترتيب">
                        </div>
                    </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">اضافة  صورة</label>

                        <input type="file" name="img" class="custom-file-input"
                        id="inputGroupFile02" />


                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('admin-points.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
