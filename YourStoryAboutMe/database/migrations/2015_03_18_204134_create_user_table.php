<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('user', function(Blueprint $table) {
			$table->incriments('user_id')->primary()->unsigned();
			$table->string('first_name');
			$table->string('middle_name');
			$table->string('last_name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->rememberToken();
			$table->timestamps();
		});
	}

	// public function up() {
	// 	Schema::table('user', function(Blueprint $table) {
	// 		$table->incriments('user_id')->primary()->unsigned();
	// 		$table->string('first_name');
	// 		$table->string('middle_name');
	// 		$table->string('last_name');
	// 		$table->string('email')->unique();
	// 		$table->string('password', 60);
	// 		$table->rememberToken();
	// 		$table->timestamps();
	// 	});
	// }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('user', function(Blueprint $table) {
			Schema::drop('user');
		});
	}

}
