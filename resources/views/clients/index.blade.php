@extends('layouts.app')
@section('page_title')
    Client
@endsection
@section('small_title')
    Client
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">list of Client</h3>

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
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Number Phone</th>
                                                    <th>Bate of Birth</th>
                                                    <th>Last Donation Data</th>
                                                    <th>Brood Type</th>
                                                    <th>City</th>
                                                    <th>Governorate</th>
                                                    <th>Is Active</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($records as $record)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$record->name}}</td>
                                                    <td>{{$record->email}}</td>
                                                    <td>{{$record->number_phone}}</td>
                                                    <td>{{$record->date_of_birth}}</td>
                                                    <td>{{$record->last_donation_data}}</td>
                                                    <td>{{$record->brood_type_id}}</td>
{{--                                                    <td>{{$record->broodtype->name}}</td> --}}
{{--                                                    @if($record->activate = 1) {<td>activate</td>} else {<td>de activate</td>} --}}
                                                    <td>{{$record->city->name}}</td>
                                                    <td>{{$record->city->governorate->name}}</td>
                                                    @if($record->is_active == 1)
                                                    <td class="text-center">
                                                        {!! Form::open([
                                                            'action' => ['ClientController@is_active',$record->id],
                                                            'method' => 'put'
                                                        ]) !!}
                                                        <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Active</button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                    @else
                                                        <td class="text-center">
                                                            {!! Form::open([
                                                                'action' => ['ClientController@is_active',$record->id],
                                                                'method' => 'put'
                                                            ]) !!}
                                                            <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i> De Active</button>
                                                            {!! Form::close() !!}
                                                        </td>
                                                    @endif
                                                    <td class="text-center">
                                                        {!! Form::open([
                                                            'action' => ['ClientController@destroy',$record->id],
                                                            'method' => 'delete'
                                                        ]) !!}
                                                            <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
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
