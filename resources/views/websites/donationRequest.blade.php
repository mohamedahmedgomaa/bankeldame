@extends('websites.layouts.index')
@inject('model', 'App\Models\DonationRequest')
@inject('bloodType', 'App\Models\BloodType')
@inject('city', 'App\Models\City')
@inject('governorate', 'App\Models\Governorate')
@section('content')

    @push('js')
        <script type="text/javascript"
                src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCxQGsoLVUxSCQm2Hz_0vuJxyhn98gZrKQ'></script>
        <script src="{{ asset('') }}adminlte/js/locationpicker.jquery.js"></script>
        <?php

        $lat = !empty(old('lat')) ? old('lat') : '30.06303689611116';
        $lng = !empty(old('lng')) ? old('lng') : '31.23264503479004';

        ?>
        <script>
            $('#us1').locationpicker({
                location: {
                    latitude: {!! $lat !!},
                    longitude: {!! $lng !!},
                },
                radius: 300,
                markerIcon: "{{ asset('adminlte/img/map-marker-2-xl.png') }}",
                inputBinding: {
                    latitudeInput: $('#lat'),
                    longitudeInput: $('#lng'),
                    // radiusInput: $('#us2-radius'),
                    // locationNameInput: $('#address')
                }

            });
        </script>
    @endpush

    @include('flash::message')


    <section id="breedcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                        </ol>
                    </nav>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 signup-form">
                    {!! Form::model($model, ['action' => 'WebSite\WelcomeController@createDonationRequest','class' => 'needs-validation']) !!}

                    <input type="hidden" value="{{ $lat }}" id="lat" name="lat">
                    <input type="hidden" value="{{ $lng }}" id="lng" name="lng">

                    <div class="form-row">
                        {!! Form::text('name', null , [
                            'class' => 'form-control',
                            'placeholder' => 'الاسم',
                            'id' => 'validationCustom01',
                            'required' => 'required'
                        ]) !!}

                        <div class="invalid-feedback">
                            Please provide a valid name.
                        </div>

                        {!! Form::text('age', null , [
                            'class' => 'form-control',
                            'placeholder' => 'العمر',
                            'id' => 'validationCustom05',
                            'required' => 'required'
                        ]) !!}
                        <div class="invalid-feedback">
                            Please provide a valid phone number .
                        </div>

                        {!! Form::text('number_of_blood_bags', null , [
                            'class' => 'form-control',
                            'placeholder' => 'عدد اكياس الدم المطلوبه',
                            'id' => 'validationCustom05',
                            'required' => 'required'
                        ]) !!}
                        <div class="invalid-feedback">
                            Please provide a valid phone number .
                        </div>

                        {!! Form::text('hospital_name', null , [
                            'class' => 'form-control',
                            'placeholder' => 'اسم المستشفى',
                            'id' => 'validationCustom05',
                            'required' => 'required'
                        ]) !!}
                        <div class="invalid-feedback">
                            Please provide a valid phone number .
                        </div>

                    </div>


                    <div class="form-row">

                        {!! Form::text('notes', null , [
                            'class' => 'form-control',
                            'placeholder' => 'ملاحظه',
                            'id' => 'validationCustom05',
                            'required' => 'required'
                        ]) !!}
                        <div class="invalid-feedback">
                            Please provide a valid phone number .
                        </div>

                        {!! Form::text('number_phone', null , [
                            'class' => 'form-control',
                            'placeholder' => 'رقم الهاتف',
                            'id' => 'validationCustom05',
                            'required' => 'required'
                        ]) !!}
                        <div class="invalid-feedback">
                            Please provide a valid phone number .
                        </div>


                        {!! Form::select('brood_type_id',$bloodType->pluck('name', 'id') , old('brood_type_id'), [
                         'class'=>'custom-select custom-select-lg mb-3 mt-3 custom-width',
                         'placeholder' => 'اختر الفصيله',
                         'id' => 'validationCustom04',
                         'required' => 'required'
                         ]) !!}

                        <div class="invalid-feedback">
                            Please provide a valid brood type.
                        </div>

                        {!! Form::select('governorate_id',$governorate->pluck('name', 'id') , old('governorate_id'), [
                         'class'=>'custom-select custom-select-lg mb-3 mt-3 custom-width',
                         'placeholder' => 'اختر المحافظه',
                         'id' => 'govenorates',
                         'required' => 'required'
                         ]) !!}

                        {!! Form::select('city_id',$city->pluck('name', 'id') , old('city_id'), [
                         'class'=>'custom-select custom-select-lg mb-3 mt-3 custom-width',
                         'placeholder' => 'اختر  المدينه',
                         'id' => 'govenorates',
                         'required' => 'required'
                         ]) !!}

                    </div>

                    <div class="form-group">
                        <div id="us1" style="width: 100%; height: 400px;"></div>
                    </div>

                    <button class="btn btn-create shadow" type="submit">انــشاء</button>
                    {!! Form::close() !!}

                    {{--                    <script>--}}
                    {{--                        // Example starter JavaScript for disabling form submissions if there are invalid fields--}}
                    {{--                        (function () {--}}
                    {{--                            'use strict';--}}
                    {{--                            window.addEventListener('load', function () {--}}
                    {{--                                // Fetch all the forms we want to apply custom Bootstrap validation styles to--}}
                    {{--                                var forms = document.getElementsByClassName('needs-validation');--}}
                    {{--                                // Loop over them and prevent submission--}}
                    {{--                                var validation = Array.prototype.filter.call(forms, function (form) {--}}
                    {{--                                    form.addEventListener('submit', function (event) {--}}
                    {{--                                        if (form.checkValidity() === false) {--}}
                    {{--                                            event.preventDefault();--}}
                    {{--                                            event.stopPropagation();--}}
                    {{--                                        }--}}
                    {{--                                        form.classList.add('was-validated');--}}
                    {{--                                    }, false);--}}
                    {{--                                });--}}
                    {{--                            }, false);--}}
                    {{--                        })();--}}
                    {{--                    </script>--}}

                </div>

            </div>
        </div>
    </section>
@endsection