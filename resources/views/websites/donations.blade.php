@extends('websites.layouts.index')
@inject('governorate', 'App\Models\Governorate')
@inject('bloodType', 'App\Models\BloodType')
@php
    $governorates = $governorate->pluck('name', 'id')->toArray();
    $bloodTypes = $bloodType->pluck('name', 'id')->toArray();
@endphp
@section('content')

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
            <div class="row background-div">
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
        <div class="container text-center">
{{--                <button class="btn more3-btn">المزيد</button>--}}
            <div class="text-center" style="margin-right: 430px;margin-top: 50px; ">{{$donations->links()}}</div>
        </div>
</section>
@else
    <div class="alert alert-danger text-center">
        No Data
    </div>
@endif

@endsection