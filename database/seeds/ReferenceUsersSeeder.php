<?php

use Illuminate\Database\Seeder;

class ReferenceUsersSeeder extends Seeder
{
    protected $data = array(
		[
			'name'=>'admin',		
			'email'=>'admin@admin.admin',		
			'is_admin'=>1,		
			'password'=>'$2y$10$UtvyRJNQ5nHqYKTYq8xbjujIj6k4TUXzY/eEYuWCMtCVD1KtEksqK',		
		],		
	);
	
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$this->seedingTable('users', $this->data);
	}

	public function seedingTable($table, $items)
	{
		foreach ($items as $item) {
			DB::table($table)->insert([
				'name' => $item['name'],			
				'email' => $item['email'],			
				'is_admin' => $item['is_admin'],			
				'password' => $item['password'],			
			]);
		}
		
	}
}
