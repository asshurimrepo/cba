<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurriculumSubjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('curriculum_subject', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('curriculum_id');
			$table->integer('subject_id');
			$table->string('schedule');
			$table->string('section');
			$table->enum('days', ['MWF', 'TTH', 'SAT', 'SUN']);
			$table->string('room');
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
		Schema::drop('curriculum_subject');
	}

}
