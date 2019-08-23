<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email')->unique();
			$table->date('date_of_birth');
			$table->integer('brood_type_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->date('last_donation_data');
			$table->integer('number_phone');
            $table->string('password');
            $table->string('api_token')->unique()->nullable();
            $table->integer('pin_code')->nullable();
            $table->boolean('is_active')->default(1);

        });
	}

	public function down()
	{
		Schema::drop('clients');
	}
}