@extends('layout.web')

@section('title', 'نقاط التقييم')

@section('content')


<div class="box">
    <div class="box-header">
      <h3 class="box-title">تصنيف {{$row->name ?? ''}} </h3>
      {{-- <a href="{{ route('admin-item-category.create') }}" class="btn btn-info btn-lg pull-right"> اضافة </a> --}}

    </div><!-- /.box-header -->
    <div class="box-body">

            <div class="box-body">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true"  data-resizable="true" data-cookie="true"
                data-show-export="true" data-locale="ar-SA"  style="direction: rtl" >
                                   <thead>
                                    <th data-field="state" data-checkbox="false"></th>
                                    <th data-field="id">#</th>



                <th>اسم الخاصية   </th>
                <th>خيارات الخاصية   </th>

                <th>التقييم   </th>




            </tr>
        </thead>
        <tbody>
            @foreach($lists as $index => $rr)
                <tr>
                    <td></td>
                    <td>{{ $index + 1 }}</td>

                    <td>{{$rr->feature->name ?? ''}}</td>
                    <td>{{$rr->name}}</td>


                    <td>{{$rr->rank}}</td>



                </tr>

            </div>
                @endforeach
            </tbody>
    </table>


@endsection
