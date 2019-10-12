<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

	protected $table = 'settings';
	public $timestamps = true;
	protected $fillable = array('number_phone', 'email', 'text', 'google_plus', 'whats_app', 'instagram', 'you_tube', 'twitter', 'facebook', 'android_app_url', 'logo');

}