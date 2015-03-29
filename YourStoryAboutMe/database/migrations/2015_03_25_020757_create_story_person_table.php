<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoryPersonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('story_person', function(Blueprint $table) {
			$table->primary(['story_id', 'person_id']);
			
			$table->integer('story_id')->foreign('story_id')
				  ->references('story_id')->on('story')
				  ->onUpdate('cascade')->onDelete('cascade');
			
			$table->integer('person_id')->foreign('person_id')
				  ->references('person_id')->on('person')
				  ->onUpdate('cascade')->onDelete('cascade');
			$table->timestamps();
		});

	// Schema::create('story_person', function(Blueprint $table) {
	// 	$table->primary(['story_id', 'person_id']);
	// 	$table->integer('story_id')->unsigned();
	// 	$table->foreign('story_id')->references('story_id')->on('story')->onDelete('cascade');

	// 	$table->integer('person_id')->unsigned();
	// 	$table->foreign('person_id')->references('person_id')->on('story')->onDelete('cascade');
	// });
	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('story_person');

	}
}


