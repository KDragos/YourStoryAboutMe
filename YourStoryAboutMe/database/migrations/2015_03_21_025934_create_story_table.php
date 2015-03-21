<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('story', function(Blueprint $table) {
			$table->increments('story_id')->unsigned();
			$table->integer('created_by')->foreign('created_by')
				  ->references('user_id')->on('user')
				  ->onUpdate('cascade')->onDelete('cascade');;
			$table->longText('story_text');
			$table->string('main_character');
			$table->string('secondary_characters');
			$table->date('published_at');
			$table->timestamps();		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('story');
	}

}
