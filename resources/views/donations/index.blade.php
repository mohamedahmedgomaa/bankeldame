@extends('layouts.app')
@section('page_title')
    التبرعات
@endsection
@section('small_title')
    تبرع
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">قائمه التبرعات</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                @if(count($records))
                    <div class="box">

                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
{{--                                <div class="row">--}}
{{--                                    <div class="col-sm-6">--}}
{{--                                        <div id="example1_filter" class="dataTables_filter"><label>Search:<input--}}
{{--                                                        type="search" class="form-control input-sm" placeholder=""--}}
{{--                                                        aria-controls="example1"></label></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                @include('flash::message')
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>الاسم</th>
                                                    <th>العمر</th>
                                                    <th>نوع الفصيله</th>
                                                    <th>عدد اكياس الدم</th>
                                                    <th>اسم المستشفى</th>
                                                    <th>مكان المستشفى</th>
                                                    <th>المدينه</th>
                                                    <th>رقم الهاتف</th>
                                                    <th>الملاحظات</th>
                                                    <th>العميل</th>
                                                    <th class="text-center">عرض طلب التبرع</th>
                                                    <th class="text-center">حذف</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($records as $record)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$record->name}}</td>
                                                    <td>{{$record->age}}</td>
                                                    <td>{{$record->brood_type_id}}</td>
                                                    <td>{{$record->number_of_blood_bags}}</td>
                                                    <td>{{$record->hospital_name}}</td>
                                                    <td>{{$record->lat}} , {{$record->lng}}</td>
                                                    <td>{{$record->city->name}}</td>
                                                    <td>{{$record->number_phone}}</td>
                                                    <td>{{$record->notes}}</td>
                                                    <td>{{$record->client->name}}</td>
                                                    <td class="text-center">
                                                        {!! Form::open([
                                                            'action' => ['DonationController@show',$record->id],
                                                            'method' => 'get'
                                                        ]) !!}
                                                        <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-address-book"></i></button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                    <td class="text-center">
                                                        {!! Form::open([
                                                            'action' => ['DonationController@destroy',$record->id],
                                                            'method' => 'delete'
                                                        ]) !!}
{{--                                                            <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>--}}
                                                        <button class="member" type="submit" onclick="return confirm('Are you sure？')"><i class="fa fa-trash-o"></i></button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="text-center">{{$records->links()}}</div>
                @else
                    <div class="alert alert-danger">
                        No Data
                    </div>
                @endif
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
