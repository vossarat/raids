<?php

use Illuminate\Database\Seeder;

class ReferenceSocialSeeder extends Seeder
{
    protected $data = array(
		['id' => 1, 'name' => 'нет социального статуса'],
	);

	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$this->seedingTable('social', $this->data);
	}

	public function seedingTable($table, $items)
	{
		foreach ($items as $item) {
			DB::table($table)->insert(['id' => $item['id'], 'name' => $item['name']]);
		}
	}
}
