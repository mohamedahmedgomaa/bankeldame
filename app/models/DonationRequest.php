<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model {

	protected $table = 'donation_requests';
	public $timestamps = true;
	protected $fillable = array('name', 'age', 'brood_type_id', 'number_of_blood_bags', 'hospital_name', 'lat', 'lng', 'city_id', 'number_phone', 'notes', 'client_id');

	public function bloodtype()
	{
		return $this->belongsTo('App\Models\BloodType','brood_type_id');
	}

	public function notifications()
	{
		return $this->hasMany('App\Models\Notification');
	}

	public function client()
	{
		return $this->belongsTo('App\Models\Client');
	}

	public function city()
	{
		return $this->belongsTo('App\Models\City');
	}

}