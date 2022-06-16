@extends('layout.web')

@section('title', ' المقالات')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">تعديل</h3>
        </div>






                  <form action="{{route('admin-blogs.update',$row->id)}}"  method="post" enctype="multipart/form-data">

                @method('PUT')
				  @csrf
                  <div class="box-body">





                        {{-- <div class="col-sm-12">
                            <div class="form-group">
                                <label  >{{ __('  العنوان  ') }}</label>
                                <textarea class="form-control " name="title" > {{$row->title}}</textarea>

                                </div>
                            </div> --}}




                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label  >{{ __('  النص  ') }}</label>
                                    <textarea class="form-control " name="text">{{$row->text}}</textarea>


                                </div>
                                </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label  >{{ __(' التاريخ ') }}</label>
                                    <input type="date" name="blog_date" value="{{date('Y-m-d', strtotime($row->blog_date))}}" class="form-control">
                                    {{-- <textarea class="form-control " name="sub_title" > {{old('sub_title')}}</textarea> --}}

                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">اضافة صورة</label>

                                    <div class="custom-file">
                                        <input type="file" name="img"
                                            class="custom-file-input"
                                            id="inputGroupFile02" />
                                        <label class="custom-file-label"
                                            for="inputGroupFile02">{{ $row->image ?? '' }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="checkbox">
                                      <label>
                                        {{ __('نشط') }}
                                        <input type="checkbox" @if($row->active==1) checked @endif id="newTitle" name="active"  value="1"/>

                                      </label>
                                    </div>

                            </div>
                            </div>


                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('admin-blogs.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
