@extends('layouts.app')
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Settings</h3>

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
                <div class="box">
                    @include('flash::message')
                    @include('partials.validations_errors')
                    <div class="box-body">
                        <form action="{{route('settings.update')}}" method="POST"  enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <div class="form-group">
                                <label for="number_phone">number_phone</label>
                                <input type="text" class="form-control" name="number_phone"  value="{{$settings->number_phone}}">
                            </div>

                            <div class="form-group">
                                <label for="blog_email">Email</label>
                                <input type="text" class="form-control" name="email"  value="{{$settings->email}}">
                            </div>

                            <div class="form-group">
                                <label for="google_plus">google_plus</label>
                                <input type="text" class="form-control" name="google_plus"  value="{{$settings->google_plus}}">
                            </div>

                            <div class="form-group">
                                <label for="whats_app">whats_app</label>
                                <input type="text" class="form-control" name="whats_app"  value="{{$settings->whats_app}}">
                            </div>

                            <div class="form-group">
                                <label for="instagram">instagram</label>
                                <input type="text" class="form-control" name="instagram"  value="{{$settings->instagram}}">
                            </div>

                            <div class="form-group">
                                <label for="you_tube">you_tube</label>
                                <input type="text" class="form-control" name="you_tube"  value="{{$settings->you_tube}}">
                            </div>

                            <div class="form-group">
                                <label for="twitter">twitter</label>
                                <input type="text" class="form-control" name="twitter"  value="{{$settings->twitter}}">
                            </div>

                            <div class="form-group">
                                <label for="facebook">facebook</label>
                                <input type="text" class="form-control" name="facebook"  value="{{$settings->facebook}}">
                            </div>

                            <div class="form-group">
                                <label for="android_app_url">android_app_url</label>
                                <input type="text" class="form-control" name="android_app_url"  value="{{$settings->android_app_url}}">
                            </div>

                            <div class="form-group">
                                <label for="logo">logo</label>
                                <input type="file" class="form-control-file" name="logo">
                            </div>
                            <img src="{{$settings->logo}}" alt="000000" class="img-thumbnail" width="50px" height="50px">

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
