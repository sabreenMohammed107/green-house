@extends('layout.web')

@section('title', ' الاصناف')

@section('content')


    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> الاصناف </h3>

        </div><!-- /.box-header -->
        <div class="box-body">

            <div class="box-body">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-resizable="true"
                    data-cookie="true" data-show-export="true" data-locale="ar-SA" style="direction: rtl">
                    <thead>
                        <th data-field="state" data-checkbox="false"></th>
                        <th data-field="id">#</th>

                        <th>الصورة </th>
                        <th>اسم المنتج </th>

                        <th>الوصف </th>
                        <th>التصنيف </th>



                        <th style="width:120px">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $index => $row)
                            <tr>
                                <td></td>
                                <td>{{ $index + 1 }}</td>
                                <td>

                                    <img style="width:100px" src="{{ asset('uploads/items') }}/{{ $row->image ?? '' }}">

                                </td>
                                <td>{{ $row->name }}</td>


                                <td>{{ $row->description }}</td>
                                <td>{{ $row->category->name ?? '' }}</td>

                                <td>
                                    <div class="btn-group">


                                        <a href="{{ route('admin-items.show', $row->id) }}">
                                            <p class=" fa fa-cogs"></p>
                                        </a>


                                        {{-- <a href="#del{{ $row->id }}" data-toggle="modal"
                                    data-target="#del{{ $row->id }}">
                                    <p class="fa  fa-times"></p>
                                </a> --}}


                                    </div>
                                </td>
                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal modal-danger" id="del{{ $row->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('admin-item-category.destroy', $row->id) }}" method="POST">
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
                                                <button type="button" class="btn btn-outline pull-left"
                                                    data-dismiss="modal">الغاء</button>
                                                <button type="submit" class="btn btn-outline">حفظ </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>


            @endsection
