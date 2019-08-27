@extends('layouts.app')
@inject('client', 'App\Models\Client')
@inject('user', 'App\User')
@inject('governorate', 'App\Models\Governorate')
@inject('city', 'App\Models\City')
@inject('category', 'App\Models\Category')
@inject('post', 'App\Models\Post')
@inject('donationRequest', 'App\Models\DonationRequest')
@inject('contact', 'App\Models\Contact')
@section('page_title')
    الصفحه الرئيسيه
@endsection
@section('small_title')
    الاحصائيات
@endsection
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <h4 class="info-box-text">عدد المسؤولين</h4>
                        <span class="info-box-number">{{ $user->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-map-marker"></i></span>

                    <div class="info-box-content">
                        <h4 class="info-box-text">عدد المحافظات</h4>
                        <span class="info-box-number">{{ $governorate->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-flag-o"></i></span>

                    <div class="info-box-content">
                        <h4 class="info-box-text">عدد المدن</h4>
                        <span class="info-box-number">{{ $city->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-person-add"></i></span>

                    <div class="info-box-content">
                        <h4 class="info-box-text">عدد العملاء</h4>
                        <span class="info-box-number">{{ $client->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon fc-bgevent-container"><i class="fa fa-filter"></i></span>

                    <div class="info-box-content">
                        <h4 class="info-box-text">عدد الاقسام</h4>
                        <span class="info-box-number">{{ $category->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa fa-comments-o"></i></span>

                    <div class="info-box-content">
                        <h4 class="info-box-text">عدد المقالات</h4>
                        <span class="info-box-number">{{ $post->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-heart"></i></span>

                    <div class="info-box-content">
                        <h4 class="info-box-text">عدد التبرعات</h4>
                        <span class="info-box-number">{{ $donationRequest->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-phone"></i></span>

                    <div class="info-box-content">
                        <h4 class="info-box-text">عدد الشكاوى والاقترحات</h4>
                        <span class="info-box-number">{{ $contact->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection
