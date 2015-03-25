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
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('story_person', function(Blueprint $table) {
			Schema::dropIfExists('story_person');

		});
	}

}
