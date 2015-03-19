<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('story', function(Blueprint $table) {
			$table->incriments('story_id')->primary();
			$table->string('created_by')->references('user_id')->on('user');
			$table->text('story_text');
			$table->string('primary_character');
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
	public function down()
	{
		Schema::table('story', function(Blueprint $table)
		{
			//
		});
	}

}
