@extends('layout.web')

@section('title', '  النقاط')

@section('content')


    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> النقاط</h3>
            <a href="{{ route('admin-points.create') }}" class="btn btn-info btn-lg pull-right"> اضافة </a>

        </div><!-- /.box-header -->
        <div class="box-body">

            <div class="box-body">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-resizable="true"
                    data-cookie="true" data-show-export="true" data-locale="ar-SA" style="direction: rtl">
                    <thead>
                        <th data-field="state" data-checkbox="false"></th>
                        <th data-field="id">#</th>
                        <th> الاسم </th>

                        <th>الصورة  </th>



                        <th>النقاط</th>

                        <th>الترتيب  </th>
                        <th>الوصف  </th>
                        <th>الاجراءات  </th>




                    </thead>
                    <tbody>

                        @foreach ($points as $index => $row)

                            <tr>
                                <td></td>
                                <td>{{ $index + 1 }}</td>

                                <td>

                                    {!! $row->name ?? '' !!}
                                </td>




                                <td>
                                    <img style="width: 100px"
                                        src="{{ asset('uploads/points') }}/{{ $row->image ?? '' }}">
                                </td>


                                <td>
                                    {!! $row->points ?? '' !!}
                                </td>
                                <td>
                                    {!! $row->order ?? '' !!}
                                </td>
                                <td>
                                    {!! $row->description ?? '' !!}
                                </td>
                                <td>
                                    <div class="btn-group">

                                        <a href="{{ route('admin-points.edit', $row->id) }}" title="Items">
                                            <p class=" fa fa-cogs"></p>
                                        </a>


                                        <button type="button"  data-toggle="modal" data-target="#del{{ $row->id }}"><i class="fa fa-times" title="حذف"></i></button>
                                    </div>
                                </td>
                                  <!-- Delete Modal -->
                         <div class="modal modal-danger" id="del{{ $row->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <form action="{{ route('admin-points.destroy', $row->id) }}"  method="POST" >
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header ">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h5 class="modal-title" id="exampleModalLabel">تأكيد الحذف</h5>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-light">
                                        <p><i class="fa fa-fire "></i></p>
                                        <p>حذف جميع البيانات ؟</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-outline pull-left">موافق </button>

                                        <button type="button" class="btn btn-outline "
                                            data-dismiss="modal">الغاء</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                                </td>


                            </tr>

            </div>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    </div>

@endsection
