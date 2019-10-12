@extends('websites.layouts.index')
@inject('governorate', 'App\Models\Governorate')
@inject('bloodType', 'App\Models\BloodType')
@php
    $governorates = $governorate->pluck('name', 'id')->toArray();
    $bloodTypes = $bloodType->pluck('name', 'id')->toArray();
@endphp
@section('content')


    <!-- Header-->
    <header id="header">
        <div class="container-fluid">
            <div class="header-text">
                <h1 class="head-text">بنك الدم نمضى قدماً لصحة افضل</h1>
                <p class="follow-text">{{$settings->text}}</p>
                <a href="{{route('welcome.howWeAre')}}">
                    <button class="btn login-btn">المزيد</button>
                </a>
            </div>
        </div>
    </header>
    <section id="about">
        <div class="container-fluid">
            <p class="about-text">بنك الدم هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                مولد
                النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى
                يولدها التطبيق.
                يطلع على صورة حقيقية لتصميم الموقع
            </p>
        </div>
    </section>

    <!-- articles -->
    <section id="articles">
        <h2 class="articles-head"><a href="{{url(route('welcome.articles'))}}"> المقالات </a></h2>
        <div class="container custom" style="direction: ltr">
            <div class="owl-carousel owl-theme" id="owl-articles">

                @foreach($posts as $post)
                    <div class="item">
                        <div class="card" style="width: 22rem;">
                            <i onclick="toggleFavourite(this)" id="{{$post->id}}" class="fab fa-gratipay
{{$post->is_favourite ? 'second-heart' : 'first-heart'}}
                                    "></i>
                            <img class="card-img-top" src="{{ $post->image }}"  style="height: 17rem;" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->content }}</p>
                                <a href="{{url(route('welcome.article',$post->id))}}">
                                    <button class="btn details-btn">التفاصيل</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <h2 class="donations-head horizntal-line">طلبات التبرع </h2>

    <!-- Donations offers  -->
    <section id="donations">
        <div class="container custom-position">
            {!! Form::open([ 'method' => 'get' ]) !!}
            <div class="row  dropdown">
                <div class="col-md-5">
                    {!! Form::select('brood_type_id',$bloodTypes,request()->input('brood_type_id'),[
                    'class' => 'select2 custom-select',
                    'placeholder' => 'اختر فصيلة الدم'
                    ]) !!}
                </div>

                <div class="col-md-5">
                    {!! Form::select('governorate_id',$governorates,request()->input('governorate_id'),[
                    'class' => 'select2 custom-select',
                    'placeholder' => 'اختر المدينة'
                    ]) !!}
                </div>
                <div class="col-md-2 search">
                    <div class="circle search-icon">
                        <button class="circle search-icon" type="submit"><i
                                    class="fas fa-search search-icon"></i></button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        @if(count($donations))
            @foreach($donations as $donation)
                <div class="container">
                <div class="row background-div ">
                    <div class="col-lg-2">
                        <div class="blood-type border-circle">
                            <div class="blood-txt">
                                {{$donation->bloodtype->name}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <ul class="order-details">
                            <li class="cutom-display"> اسم الحالة:</li>
                            <span class="cutom-display">{{$donation->name}}</span> <br>

                            <li class="cutom-display custom-padding"> مستشفي:</li>
                            <span class="cutom-display custom-padding"> {{$donation->hospital_name}}</span> <br>

                            <div class="adjust-position">
                                <li class="cutom-display "> المدينة:</li>
                                <span class="cutom-display ">{{$donation->city->name}}</span>
                            </div>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <a href="{{url(route('welcome.donationDetails', $donation->id))}}">
                            <button class="btn more2-btn">التفاصيل</button>
                        </a>
                    </div>
                </div>
                </div>
            @endforeach
        <div class="container custom-position">
            <a href="{{route('welcome.donations')}}">
                <button class="btn more3-btn">المزيد</button>
            </a>
        </div>
        @else
            <div class="alert alert-danger text-center">
                No Data
            </div>
        @endif
    </section>


    <!-- call us section  -->
    <section id="call-us">
        <h3 class="call-us-head">اتـــصل بنا</h3>
        <P class="call-us-follow-text">يمكنكم الاتصال بنا للاستفسار عن المعلومات وسيتم التواصل معكم فوراً </P>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="whatsup">
                        <p id="number">{{$settings->number_phone}}</p>
                        <img class="whats-logo" src="{{asset('')}}website/imgs/whats.png">


                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- mobile app   -->
    <section id="mobile-app">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <P class="app-head">تطبيق بنك الدم</P>
                    <P class="app-text">هذا النص هو مثال لنص يمكن ان يستبدل فى نفس المساحه, لقد تم توليد هذا النص من
                        مولد
                        النص العربى</P>
                    <p class="availbale">متـــوفر علي </p>
                    <div class="stores">
                        <img src="{{asset('')}}website/imgs/google.png">
                        <img src="{{asset('')}}website/imgs/ios.png">


                    </div>
                </div>
                <div class="col-md-6">
                    <img class="app image-responsive" src="{{asset('')}}website/imgs/App.png">
                </div>

            </div>

        </div>
    </section>
@endsection