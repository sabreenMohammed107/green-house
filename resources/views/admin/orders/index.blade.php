@extends('layout.web')

@section('title', '  الاوردارات')

@section('content')


    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> الاوردر</h3>
            {{-- <a href="{{ route('admin-users.index') }}" class="btn btn-info btn-lg pull-right"> back </a> --}}

        </div><!-- /.box-header -->
        <div class="box-body">

            <div class="box-body">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-resizable="true"
                    data-cookie="true" data-show-export="true" data-locale="ar-SA" style="direction: rtl">
                    <thead>
                        <th data-field="state" data-checkbox="false"></th>
                        <th data-field="id">#</th>
                        <th>رقم الاوردر </th>
                        <th> المستخدم </th>
                        <th>تاريخ الاوردر </th>

                        <th>الحالة</th>



                        <th>{{ __('الإجراء') }}</th>


                    </thead>
                    <tbody>

                        @foreach ($rows as $index => $row)

                            <tr>
                                <td></td>
                                <td>{{ $index + 1 }}</td>

                                <td>

                                    {!! $row->id !!}
                                </td>

                                <td>

                                    {!! $row->user->name ?? '' !!}
                                </td>


                                <td>
                                    <p>{{date('d-m-Y', strtotime($row->order_date))}}</p>
                                </td>


                                <td>
                                    {!! $row->status->status ?? '' !!}
                                </td>

                                <td>
                                    <div class="btn-group">

                                        <a href="{{ route('admin-orders.edit', $row->id) }}" title="Items">
                                            <p class=" fa fa-cogs"></p>
                                        </a>
                                        {{-- <a href="{{ route('admin-users.show', $row->id) }}" title="orders">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin-users-point', $row->id) }}" title="points">
                                            <i class="fa fa-gift" aria-hidden="true"></i>
                                        </a> --}}



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
