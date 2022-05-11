@extends('layout.web')

@section('title', '  النقاط')

@section('content')


    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> {{$user->name}} - {{$user->current}} point</h3>
            <a href="{{ route('admin-users.index') }}" class="btn btn-info btn-lg pull-right"> back </a>

        </div><!-- /.box-header -->
        <div class="box-body">

            <div class="box-body">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-resizable="true"
                    data-cookie="true" data-show-export="true" data-locale="ar-SA" style="direction: rtl">
                    <thead>
                        <th data-field="state" data-checkbox="false"></th>
                        <th data-field="id">#</th>
                        <th> الاسم </th>

                        <th>التاريخ  </th>

                        <th>النقاط</th>






                    </thead>
                    <tbody>

                        @foreach ($points as $index => $row)

                            <tr>
                                <td></td>
                                <td>{{ $index + 1 }}</td>

                                <td>

                                    {!! $row->prize->name ?? '' !!}
                                </td>




                                <td>
                                    <p>{{date('d-m-Y', strtotime($row->confirm_date))}}</p>
                                </td>


                                <td>
                                    {!! $row->confirm_points ?? '' !!}
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
