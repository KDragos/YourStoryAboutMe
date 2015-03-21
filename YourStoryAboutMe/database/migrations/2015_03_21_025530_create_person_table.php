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
			$table->increments('person_id')->unsigned();
			$table->integer('user_id')->unique()->nullable()
				  ->foreign('user_id')->references('user_id')
				  ->on('user')->onUpdate('cascade')
				  ->onDelete('cascade');
			
			$table->string('first_name');
			$table->string('middle_name')->nullable();
			$table->string('last_name');
			$table->string('suffix')->nullable();
			$table->date('birth_date');
			$table->date('death_date')->nullable();
			$table->timestamps();
		});

	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('person');
	}

}
