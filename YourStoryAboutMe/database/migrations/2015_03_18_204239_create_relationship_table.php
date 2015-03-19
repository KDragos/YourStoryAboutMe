<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Schema::create('relationship', function(Blueprint $table) {
		// 	// $table->incriments('person_id')->primary();
		// 	// $table->string('user_id');
		// 	// $table->string('first_name');
		// 	// $table->string('middle_name');
		// 	// $table->string('last_name');
		// 	// $table->date('birth_date');
		// 	// $table->date('death_date');
		// 	// $table->timestamps();
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('relationship', function(Blueprint $table)
		{
			//
		});
	}

}
