@extends('layout.web')

@section('title', 'بيانات التواصل')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">تعديل</h3>
        </div>






                  <form action="{{route('admin-company-contact.update',$row->id)}}" method="POST">
                @method('PUT')
				  @csrf
                  <div class="box-body">

                    <div class="col-md-12">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label  >{{ __(' تليفون') }}</label>
                                <input type="text" id="newTitle" name="fax" value="{{$row->fax}}" class="form-control"
                                   placeholder=" تليفون">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label  >{{ __(' فاكس') }}</label>
                                <input type="text" id="newTitle" name="phone" value="{{$row->phone}}" class="form-control"
                                   placeholder=" فاكس">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __(' البريد الالكترونى') }}</label>
                                    <input type="text" id="newTitle" name="email" value="{{$row->email}}" class="form-control"
                                       placeholder="البريد الالكترونى">
                            </div>
                            </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label  >{{ __(' facebook') }}</label>
                                <input type="text" id="facebook" name="facebook" value="{{$row->facebook}}" class="form-control"
                                   placeholder=" facebook">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __('  twitter') }}</label>
                                    <input type="text" id="newTitle" name="twitter" value="{{$row->twitter}}" class="form-control"
                                       placeholder=" twitter">
                            </div>
                            </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label  >{{ __(' instagram') }}</label>
                                <input type="text" id="newTitle" name="instagram" value="{{$row->instagram}}" class="form-control"
                                   placeholder=" instagram">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __('  youtube') }}</label>
                                    <input type="text" id="newTitle" name="youtube" value="{{$row->youtube}}" class="form-control"
                                       placeholder=" youtube">
                            </div>
                            </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __('  linkedin') }}</label>
                                    <input type="text" id="newTitle" name="linkedin" value="{{$row->linkedin}}" class="form-control"
                                       placeholder=" linkedin">
                            </div>
                            </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __('  الخريطه') }}</label>
                                    <input type="text" id="newTitle" name="google_map" value="{{$row->google_map}}" class="form-control"
                                       placeholder=" الخريطة">
                            </div>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __('  العنوان ') }}</label>
                                <textarea class="form-control " name="address">{{$row->address}}</textarea>


                            </div>
                            </div>
                    </div>

                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('admin-company-contact.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
