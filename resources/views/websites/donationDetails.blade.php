@extends('websites.layouts.index')
@push('js')
    <!-- Location picker -->
    <script type="text/javascript"
            src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCxQGsoLVUxSCQm2Hz_0vuJxyhn98gZrKQ'></script>
    <script src="{{ asset('') }}adminlte/js/locationpicker.jquery.js"></script>
    @php

        $lat = !empty($donations->lat) ? $donations->lat:'30.06303689611116';
        $lng = !empty($donations->lng) ? $donations->lng:'31.23264503479004';

    @endphp
    <script>
        $('#us1').locationpicker({
            location: {
                latitude: {{ $lat }},
                longitude: {{ $lng }},
            },
            radius: 300,
            markerIcon: '{{asset('uploads/1.png')}}',
            inputBinding: {
                latitudeInput: $('#lat'),
                longitudeInput: $('#lng'),
                // radiusInput: $('#us2-radius'),
                locationNameInput: $('#us2-address')
            }

        });
    </script>
@endpush
@section('content')
    <!-- breedcrumb-->
    <section id="breedcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding: 0;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">طلب التبرع: {{$donations->name}}</li>
                        </ol>
                    </nav>

                </div>
            </div>
            <div class="row bg-for-details">
                <div class="col-md-6">
                    <input type="hidden" value="{{ $lat }}" id="lat" name="lat">
                    <input type="hidden" value="{{ $lng }}" id="lng" name="lng">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">الاسم</div>
                        </div>
                        <input type="text" class="form-control bg-white" id="inlineFormInputGroup"
                               value="{{$donations->name}}"
                               disabled>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">العمر</div>
                        </div>
                        <input type="text" class="form-control bg-white" id="inlineFormInputGroup"
                               value="{{$donations->age}}" disabled>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">المشفي</div>
                        </div>
                        <input type="text" class="form-control bg-white" id="inlineFormInputGroup"
                               value="{{$donations->hospital_name}}"
                               disabled>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">فصيلة الدم</div>
                        </div>
                        <input type="text" class="form-control bg-white" id="inlineFormInputGroup"
                               value="{{$donations->BloodType->name}}" disabled>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">عدد الاكياس المطلوبة</div>
                        </div>
                        <input type="text" class="form-control bg-white" id="inlineFormInputGroup"
                               value="{{$donations->number_of_blood_bags}}" disabled>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">رقم الجوال</div>
                        </div>
                        <input type="text" class="form-control bg-white" id="inlineFormInputGroup"
                               value="{{$donations->number_phone}}"
                               disabled>
                    </div>
                </div>
            </div>
            <div class="row bg-white">
                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">عنوان المشفي</div>
                        </div>
                        <input type="text" class="form-control bg-white" id="inlineFormInputGroup"
                               value="{{$donations->lat}}-{{$donations->lng}}"
                               disabled>
                    </div>

                </div>
                <div class="edit">
                    <button class="btn more3-btn ">الملاحظات</button>
                </div>


            </div>
            <div class="row bg-white">
                <div class="col-md-12">
                    <P class="details-text">{{$donations->notes}}</P>

                </div>

            </div>
            <div class="row bg-white">
                <div class="col-md-12 map">
                    <div id="us1" style="width: 100%; height: 400px;"></div>
                </div>
            </div>


        </div>


    </section>

@endsection