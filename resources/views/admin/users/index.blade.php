@extends('layout.web')

@section('title', '  المستخدمين')

@section('content')


    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> المستخدمين</h3>
            {{-- <a href="{{ route('admin-company.create') }}" class="btn btn-info btn-lg pull-right"> اضافة </a> --}}

        </div><!-- /.box-header -->
        <div class="box-body">

            <div class="box-body">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-resizable="true"
                    data-cookie="true" data-show-export="true" data-locale="ar-SA" style="direction: rtl">
                    <thead>
                        <th data-field="state" data-checkbox="false"></th>
                        <th data-field="id">#</th>
                        <th>الاسم </th>

                        <th>البريد الالكتروني</th>

                        <th>الموبايل</th>


                        <th>النقاط الحالية </th>


                        <th>{{ __('الإجراء') }}</th>
                    </thead>
                    <tbody>

                        @foreach ($rows as $index => $row)

                            <tr>
                                <td></td>
                                <td>{{ $index + 1 }}</td>

                                <td>

                                    {!! $row->name !!}
                                </td>




                                <td>
                                    {!! $row->email !!}
                                </td>


                                <td>
                                    {!! $row->mobile !!}
                                </td>

                                <td>
                                    {{$row->current}}
                                </td>

                                <td>
                                    <div class="btn-group">

                                        <a href="{{ route('admin-users.edit', $row->id) }}" title="Items">
                                            <p class=" fa fa-cogs"></p>
                                        </a>
                                        <a href="{{ route('admin-users.show', $row->id) }}" title="orders">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin-users-point', $row->id) }}" title="points">
                                            <i class="fa fa-gift" aria-hidden="true"></i>
                                        </a>



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
