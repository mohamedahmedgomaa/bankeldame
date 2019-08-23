<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('number_phone')->nullable();
			$table->string('email')->nullable();
			$table->string('google_plus')->nullable();
			$table->integer('whats_app')->nullable();
			$table->string('instagram')->nullable();
			$table->string('you_tube')->nullable();
			$table->string('twitter')->nullable();
			$table->string('facebook')->nullable();
			$table->string('android_app_url')->nullable();
			$table->string('logo')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}