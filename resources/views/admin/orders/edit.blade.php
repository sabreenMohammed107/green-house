@extends('layout.web')

@section('title', '  الاصناف')

@section('content')


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">  {{$order->user->name ?? ''}} </h3>
            {{-- <a href="{{ route('admin-users.index') }}" class="btn btn-info btn-lg pull-right"> back </a> --}}

        </div><!-- /.box-header -->
        <div class="box-body">
            <?php

            $counter = 1;

            ?>
            <?php
            $counterrrr = 1;
            ?>
             {{-- <form action="{{ route('admin-orders.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }} --}}
            <div class="box-body">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-resizable="true"
                    data-cookie="true" data-show-export="true" data-locale="ar-SA" style="direction: rtl">
                    <thead>
                        <th data-field="state" data-checkbox="false"></th>
                        <th data-field="id">#</th>
                        <th>الاسم </th>

                        <th>الصورة</th>

                        <th>الكمية</th>


                        <th>النقاط  </th>



                    </thead>
                    <tbody>

                        @foreach ($items as $index => $row)

                            <tr>
                                <td></td>
                                <td>{{ $index + 1 }}</td>

                                <td>
                                    <input type="hidden" name="order_item_id{{ $counter }}"
                                    value="{{ $row->id }}">
                                    {!! $row->item->name !!}
                                </td>




                                <td>
                                   <img style="width: 100px"
                                        src="{{ asset('uploads/items') }}/{{ $row->item->image ?? '' }}">

                                </td>


                                <td>
                                    {!! $row->quantity ?? '' !!}
                                </td>


                                    <td>
                                        {!! $row->points_done ?? '' !!}
                                    </td>



                            </tr>

            </div>


            @endforeach
            </tbody>
            </table>


        </div>
        <div class="box-footer">
            <a href="{{route('admin-orders.index')}}" class="btn btn-danger">إلغاء</a>
        </div>
    {{-- </form> --}}
    </div>
    </div>
    </div>
    </div>

@endsection
