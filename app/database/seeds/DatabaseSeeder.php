<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('SubjectsTableSeeder');
		$this->call('PrerequisitesTableSeeder');
		$this->call('CurriculumsTableSeeder');
		$this->call('StudentsTableSeeder');
		$this->call('EnrollmentsTableSeeder');
		$this->call('TeachersTableSeeder');
		$this->call('UsersTableSeeder');
	}

}