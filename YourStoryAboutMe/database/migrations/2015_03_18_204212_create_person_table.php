<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration {



	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('person', function(Blueprint $table) {
			$table->incriments('person_id')->primary();
			$table->string('user_id')->references('user_id')->on('user');
			$table->string('first_name');
			$table->string('middle_name');
			$table->string('last_name');
			$table->date('birth_date');
			$table->date('death_date');
			$table->timestamps();
		});
	}


$table->primary(['first', 'last']);


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('person', function(Blueprint $table) {
			Schema::drop('person');
		});
	}

}
