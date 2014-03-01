<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotCurriculumSubjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('curriculum_subject', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('curriculum_id')->unsigned()->index();
			$table->integer('subject_id')->unsigned()->index();
			$table->foreign('curriculum_id')->references('id')->on('curriculums')->onDelete('cascade');
			$table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
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
