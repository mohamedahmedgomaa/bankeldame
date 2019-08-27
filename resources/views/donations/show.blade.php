@extends('layouts.app')
@section('page_title')
    عرض طلب التبرع
@endsection
@section('small_title')
    طلب التبرع
@endsection
@section('content')
    @push('js')
        <!-- Location picker -->
        <script type="text/javascript"
                src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCxQGsoLVUxSCQm2Hz_0vuJxyhn98gZrKQ'></script>
        <script src="{{ asset('') }}adminlte/js/locationpicker.jquery.js"></script>
        <?php

        $lat = !empty($donations->lat) ? $donations->lat:'30.06303689611116';
        $lng = !empty($donations->lng) ? $donations->lng:'31.23264503479004';

        ?>
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
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">عرض طلب التبرع</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">

                                        <tbody>
                                        <tr>
                                            <th>اسم المريض</th>
                                            <td>{{$donations->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>العمر</th>
                                            <td>{{$donations->age}}</td>
                                        </tr>
                                        <tr>
                                            <th>فصيله الدم</th>
                                            <td>{{$donations->brood_type_id}}</td>
                                        </tr>
                                        <tr>
                                            <th>عدد اكياس الدم المطلوبه</th>
                                            <td>{{$donations->number_of_blood_bags}}</td>
                                        </tr>
                                        <tr>
                                            <th>اسم المستشفى</th>
                                            <td>{{$donations->hospital_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>المدينه</th>
                                            <td>{{$donations->city->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>المحافظه</th>
                                            <td>{{$donations->city->governorate->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>رقم الهاتف</th>
                                            <td>{{$donations->number_phone}}</td>
                                        </tr>
                                        <tr>
                                            <th>الملاحظات</th>
                                            <td>{{$donations->notes}}</td>
                                        </tr>
                                        <tr>
                                            <th>اسم العميل</th>
                                            <td>{{$donations->client->name}}</td>
                                        </tr>
{{--                                        <tr>--}}
{{--                                            <th>مكان المستشفى</th>--}}
{{--                                            <td>latitude: {{$donations->lat}} ,longitude: {{$donations->lng}}</td>--}}
{{--                                        </tr>--}}
                                        {{--                         الخريطه                     --}}

                                        </tbody>
                                    </table>
                                    <div id="us1" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection