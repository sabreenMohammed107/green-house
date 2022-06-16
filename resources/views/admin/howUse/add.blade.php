@extends('layout.web')

@section('title', ' طريقة الاستخدام ')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">اضافة</h3>
        </div>






                  <form action="{{route('admin-how-use.store')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="box-body">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('  العنوان  ') }}</label>
                                <input type="text" id="newTitle" name="title" value="{{old('title')}}" class="form-control"
                                   placeholder=" العنوان">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __('  عنوان فرعي  ') }}</label>
                                    <input type="text" id="newTitle" name="sub_title" value="{{old('sub_title')}}" class="form-control"
                                       placeholder=" عنوان فرعي">
                                </div>
                            </div>


                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label  >{{ __('  النص  ') }}</label>
                                        <textarea class="form-control " name="text">{{old('text')}}</textarea>


                                    </div>
                                    </div>



                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label  >{{ __(' التاريخ ') }}</label>
                                            <input type="date" name="use_date" class="form-control">
                                            {{-- <textarea class="form-control " name="sub_title" > {{old('sub_title')}}</textarea> --}}

                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">الترتيب</label>
                                                <input type="number"
                                                    value="{{old('order')}}"
                                                    name="order" class="form-control"
                                                    id="">
                                            </div>
                                        </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('admin-how-use.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
