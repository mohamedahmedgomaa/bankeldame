@extends('layouts.app')
@section('page_title')
    Donation Request
@endsection
@section('small_title')
    donation
@endsection
@section('content')
    <div class="row" style="margin-top: 40px;margin-bottom: -1px">
        <div class="col-lg-offset-3">
            <div>
                <span class="text-yellow" style="font-size: 28px">Name: </span>
                <span style="margin-left: 215px;    font-size: 24px;">{{$products->name}}</span>
            </div>

            <div>
                <span class="text-yellow" style="font-size: 28px">Age: </span>
                <span style="margin-left: 240px;    font-size: 24px;">{{$products->age}}</span>
            </div>

            <div>
                <span class="text-yellow" style="font-size: 28px">Blood Type id: </span>
                <span style="margin-left: 126px;    font-size: 24px;">{{$products->brood_type_id}}</span>
            </div>

            <div>
                <span class="text-yellow" style="font-size: 28px">Number of Blood bags: </span>
                <span style="margin-left: 25px;    font-size: 24px;">{{$products->number_of_blood_bags}}</span>
            </div>

            <div>
                <span class="text-yellow" style="font-size: 28px">Hospital Name</span>
                <span style="margin-left: 125px;    font-size: 24px;">{{$products->hospital_name}}</span>
            </div>

            <div>
                <span class="text-yellow" style="font-size: 28px">hospital direction </span>
                <span style="margin-left: 90px;    font-size: 24px;">latitude: {{$products->lat}} ,longitude: {{$products->lng}}</span>
            </div>

            <div>
                <span class="text-yellow" style="font-size: 28px">city</span>
                <span style="margin-left: 255px;    font-size: 24px;">{{$products->city->name}}</span>
            </div>

            <div>
                <span class="text-yellow" style="font-size: 28px">Governorate: </span>
                <span style="margin-left: 140px;    font-size: 24px;">{{$products->city->governorate->name}}</span>
            </div>

            <div>
                <span class="text-yellow" style="font-size: 28px">Number Phone</span>
                <span style="margin-left: 120px;    font-size: 24px;">{{$products->number_phone}}</span>
            </div>

            <div>
                <span class="text-yellow" style="font-size: 28px">Notes: </span>
                <span style="margin-left: 220px;    font-size: 24px;"> {{$products->notes}}</span>
            </div>

            <div>
                <span class="text-yellow" style="font-size: 28px">Client: </span>
                <span style="margin-left: 220px;    font-size: 24px;">{{$products->client->name}}</span>
            </div>
        </div>
    </div>






@endsection