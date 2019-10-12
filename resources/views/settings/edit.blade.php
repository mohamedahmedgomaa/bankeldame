@extends('layouts.app')
@section('content')
@section('page_title')
    صفحه الاعدادات
@endsection
@section('small_title')
    الاعدادات
@endsection
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">صفحه الاعدادات</h3>

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
                                <label for="number_phone">رقم الهاتف</label>
                                <input type="text" class="form-control" name="number_phone"  value="{{$settings->number_phone}}">
                            </div>

                            <div class="form-group">
                                <label for="blog_email">البريد الالكترونى</label>
                                <input type="text" class="form-control" name="email"  value="{{$settings->email}}">
                            </div>

                            <div class="form-group">
                                <label for="text">Text</label>
                                <textarea name="text" class="form-control">{{$settings->text}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="google_plus">Google Plus</label>
                                <input type="text" class="form-control" name="google_plus"  value="{{$settings->google_plus}}">
                            </div>


                            <div class="form-group">
                                <label for="whats_app">واتس اب</label>
                                <input type="text" class="form-control" name="whats_app"  value="{{$settings->whats_app}}">
                            </div>

                            <div class="form-group">
                                <label for="instagram">انستيجرام</label>
                                <input type="text" class="form-control" name="instagram"  value="{{$settings->instagram}}">
                            </div>

                            <div class="form-group">
                                <label for="you_tube">يوتيوب</label>
                                <input type="text" class="form-control" name="you_tube"  value="{{$settings->you_tube}}">
                            </div>

                            <div class="form-group">
                                <label for="twitter">تويتر</label>
                                <input type="text" class="form-control" name="twitter"  value="{{$settings->twitter}}">
                            </div>

                            <div class="form-group">
                                <label for="facebook">فيس بوك</label>
                                <input type="text" class="form-control" name="facebook"  value="{{$settings->facebook}}">
                            </div>

                            <div class="form-group">
                                <label for="android_app_url">مسار تطبيق الاندرويد</label>
                                <input type="text" class="form-control" name="android_app_url"  value="{{$settings->android_app_url}}">
                            </div>

                            <div class="form-group">
                                <label for="logo">صوره الموقع</label>
                                <input type="file" class="form-control-file" name="logo">
                                <img src="{{$settings->logo}}" alt="000000" class="img-thumbnail" width="50px" height="50px">
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">تعديل</button>
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
