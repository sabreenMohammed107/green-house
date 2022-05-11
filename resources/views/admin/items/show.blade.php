@extends('layout.web')

@section('title', ' الاصناف')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">اضافة</h3>
        </div>




        <form action=""  method="post" enctype="multipart/form-data">


          <div class="box-body">

            <div class="col-sm-12">
                <div class="form-group">
                    <label  >{{ __('  اسم التصنيف  ') }}</label>
                        <input type="text" id="newTitle" name="name" value="{{$row->category->name ?? ''}}" class="form-control"
                           placeholder=" الاسم">
                    </div>
                </div>
                <div class="col-sm-12">
                <div class="form-group">
                    <label  >{{ __('  اسم المنتج  ') }}</label>
                        <input type="text" id="newTitle" name="name" value="{{$row->name}}" class="form-control"
                           placeholder=" الاسم">
                    </div>
                </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('  الوصف  ') }}</label>
                            <textarea class="form-control " name="description" > {{$row->description}}</textarea>

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
        <div class="col-xs-6 col-sm-6 col-md-6 text-center">
            {{-- <button type="submit" class="btn btn-primary">حفظ</button> --}}
            <a href="{{route('admin-items.index')}}" class="btn btn-danger">إلغاء</a>
        </div>
        </div>

          </form>
              </div>
    </div>

@endsection
