@extends('layout.web')

@section('title', 'جرين هاوس بالارقام')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">اضافة</h3>
        </div>






                  <form action="{{route('admin-counter.store')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="box-body">

                        <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('  النص  ') }}</label>
                                <input type="text" id="newTitle" name="counter_text" value="{{old('counter_text')}}" class="form-control"
                                   placeholder=" النص">
                            </div>
                        </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label  >{{ __('  القيمة  ') }}</label>
                                    <textarea class="form-control " name="counter_value">{{old('counter_value')}}</textarea>


                                </div>
                                </div>






                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('admin-counter.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
