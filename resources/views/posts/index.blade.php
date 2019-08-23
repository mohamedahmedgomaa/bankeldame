@extends('layouts.app')
@section('page_title')
    Post
@endsection
@section('small_title')
    post
@endsection
@section('content')


    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">list of Posts</h3>

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
                                <a href="{{url(route('post.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i> New Post</a>
                                <br>
                                @include('flash::message')
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Content</th>
                                                    <th>image</th>
                                                    <th>Category id</th>
                                                    <th class="text-center">Edit</th>
                                                    <th class="text-center">Delete</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($records as $record)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$record->title}}</td>
                                                    <td>{{$record->content}}</td>
{{--                                                    <td>{{$record->image}}</td>--}}
                                                    <td>
                                                        <img src="{{$record->image}}" alt="000000" class="img-thumbnail" width="50px" height="50px">
                                                    </td>
                                                    <td>{{$record->category_id}}</td>
                                                    <td class="text-center">
                                                        <a href="{{url(route('post.edit', $record->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                                                    </td>
                                                    <td class="text-center">
                                                        {!! Form::open([
                                                            'action' => ['PostController@destroy',$record->id],
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
