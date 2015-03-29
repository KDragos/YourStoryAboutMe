<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
   		Schema::create('relationship', function(Blueprint $table) {
			$table->primary(['person_id1', 'person_id2']);
			
			$table->integer('person_id1')->foreign('person_id1')
				  ->references('user_id')->on('user')
				  ->onUpdate('cascade')->onDelete('cascade');
			
			$table->integer('person_id2')->foreign('person_id2')
				  ->references('person_id')->on('person')
				  ->onUpdate('cascade')->onDelete('cascade');
			
			$table->string('relationship');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('relationship');
	}

}
