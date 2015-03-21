<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('challenge', function(Blueprint $table) {
			$table->increments('challenge_id')->unsigned();
			
			$table->integer('story_id')->foreign('story_id')
				  ->references('story_id')->on('story')
				  ->onUpdate('cascade')->onDelete('cascade');;
			
			$table->integer('created_by')->foreign('created_by')
				  ->references('user_id')->on('user')
				  ->onUpdate('cascade')->onDelete('cascade');;
			
			$table->longText('story_text');
			$table->timestamps();
		});
	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('challenge');
	}

}
