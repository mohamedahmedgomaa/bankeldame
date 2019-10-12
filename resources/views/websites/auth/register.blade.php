@extends('websites.layouts.index')
@inject('bloodType', 'App\Models\BloodType')
@inject('model', 'App\Models\Client')


@section('content')
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
                    {!! Form::model($model, ['action' => 'WebSite\AuthController@registerClient','class' => 'needs-validation']) !!}

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
                        {!! Form::email('email', null , [
                            'class' => 'form-control',
                            'placeholder' => 'البريد الاكتروني',
                            'id' => 'validationCustom02',
                            'required' => 'required'
                        ]) !!}
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="form-row">
                        {!! Form::text('password', null , [
                        'class' => 'form-control',
                        'placeholder' => 'الرقم السرى',
                        'id' => 'exampleInputPassword1',
                        'required' => 'required'
                    ]) !!}

                        {!! Form::text('password_confirmation', null , [
                            'class' => 'form-control',
                            'placeholder' => 'تأكيد الرقم السرى',
                            'id' => 'exampleInputPassword1',
                            'required' => 'required'
                        ]) !!}
                    </div>

                    <div class="form-row">

                        {!! Form::text('date_of_birth', null , [
                            'class' => 'form-control',
                            'placeholder' => 'تاريخ الميلاد',
                            'id' => 'BD',
                            'id' => 'validationCustom03',
                            'required' => 'required'
                        ]) !!}

                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>

                        {!! Form::select('brood_type_id',$bloodType->pluck('name', 'id') , old('brood_type_id'), [
                         'class'=>'custom-select custom-select-lg mb-3 mt-3 custom-width',
                         'placeholder' => 'اختر الفصيله',
                         'id' => 'validationCustom04',
                         'required' => 'required'
                         ]) !!}

                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>

                        {{--                        {!! Form::select('governorate_id',$governorate->pluck('name', 'id') , old('governorate_id'), [--}}
                        {{--                         'class'=>'custom-select custom-select-lg mb-3 mt-3 custom-width',--}}
                        {{--                         'placeholder' => 'اختر المحافظه',--}}
                        {{--                         'id' => 'govenorates',--}}
                        {{--                         'required' => 'required'--}}
                        {{--                         ]) !!}--}}
                        <select class="custom-select custom-select-lg mb-3 mt-3 custom-width" id="governorate_id"
                                name="governorate_id">
                            <option value="" selected>اختر المحافظه</option>
                            @foreach($governorates as $governorate)
                                <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                            @endforeach
                        </select>

                        <select class="custom-select custom-select-lg mb-3 mt-3 custom-width" id="city_id"
                                name="city_id">
                            <option value="" selected>اختر المدينة</option>
                        </select>


                        {{--                        {!! Form::select('city_id',$city->pluck('name', 'id') , old('city_id'), [--}}
                        {{--                         'class'=>'custom-select custom-select-lg mb-3 mt-3 custom-width',--}}
                        {{--                         'placeholder' => 'اختر  المدينه',--}}
                        {{--                         'id' => 'govenorates',--}}
                        {{--                         'required' => 'required'--}}
                        {{--                         ]) !!}--}}


                        {{--                        <input type="text" class="form-control" id="validationCustom05" placeholder="رقم الهاتف"--}}
                        {{--                               required>--}}
                        {!! Form::text('number_phone', null , [
                            'class' => 'form-control',
                            'placeholder' => 'رقم الهاتف',
                            'id' => 'validationCustom05',
                            'required' => 'required'
                        ]) !!}
                        <div class="invalid-feedback">
                            Please provide a valid phone number .
                        </div>


                        {!! Form::text('last_donation_data', null , [
                            'class' => 'form-control',
                            'placeholder' => 'اخر تاريخ تبرع',
                            'id' => 'validationCustom03',
                            'id'=>'ddd',
                            'required' => 'required'
                        ]) !!}
                        <span class="calendar-btn"
                              onclick="pureJSCalendar.open('dd/MM/yyyy',-10, -10, 1, '1800-5-5', '2019-8-20', 'ddd', 20)">
                        <i class="fas fa-calendar-alt second-icon"></i>
                        <div id="my-calendar"></div>
                      </span>


                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                توافق على الشروط والأحكام
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-create shadow" type="submit">انــشاء</button>
                    {!! Form::close() !!}

                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function () {
                            'use strict';
                            window.addEventListener('load', function () {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function (form) {
                                    form.addEventListener('submit', function (event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();
                    </script>

                </div>

            </div>
        </div>
    </section>

    @push('js')
        <script>
            $("#governorate_id").change(function () {
                var governorate_id = $("#governorate_id").val();
                // alert('ddddd');
                var url = "{{url('api/cities?governorate_id=')}}"+governorate_id;
                // console.log(url);
                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        // alert('aaaaaa');
                        $('#city_id').empty();
                        var option = '<option value="">اختر المدينة</option>';
                        $("#city_id").append(option);
                        $.each(data.data, function (index, city) {
                            var option = '<option value="' + city.id + '">' + city.name + '</option>';
                            $("#city_id").append(option);
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });
        </script>
    @endpush
@endsection