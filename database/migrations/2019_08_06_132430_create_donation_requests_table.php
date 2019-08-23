<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->float('age');
			$table->integer('brood_type_id')->unsigned();
			$table->integer('number_of_blood_bags');
			$table->string('hospital_name');
			$table->decimal('lat', 10,8);
			$table->decimal('lng', 10,8);
			$table->integer('city_id')->unsigned();
			$table->string('number_phone');
			$table->string('notes');
			$table->integer('client_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}