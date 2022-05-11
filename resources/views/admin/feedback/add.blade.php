@extends('layout.web')

@section('title', 'اراء العملاء')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">اضافة</h3>
        </div>






                  <form action="{{route('admin-feedback.store')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="box-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __(' التاريخ ') }}</label>
                            <input type="date" name="feedback_date" class="form-control">
                            {{-- <textarea class="form-control summernote" name="sub_title" > {{old('sub_title')}}</textarea> --}}

                            </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('  الاسم  ') }}</label>
                                <input type="text" id="newTitle" name="name" value="{{old('name')}}" class="form-control"
                                   placeholder=" الاسم">
                            </div>
                        </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label  >{{ __('  الوظيفة  ') }}</label>
                                    <textarea class="form-control " name="position">{{old('position')}}</textarea>


                                </div>
                                </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __('  النص  ') }}</label>
                                <textarea class="form-control " name="feedback">{{old('feedback')}}</textarea>


                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">اضافة  صورة</label>

                                    <input type="file" name="img" class="custom-file-input"
                                    id="inputGroupFile02" />


                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="checkbox">
                                      <label>
                                        {{ __('نشط') }}
                                        <input type="checkbox" checked  id="newTitle" name="active"  value="1"/>

                                      </label>
                                    </div>

                            </div>
                            </div>

                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('admin-feedback.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
