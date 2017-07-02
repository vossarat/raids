<?php

use Illuminate\Database\Seeder;

class ReferenceIfaSeeder extends Seeder
{
    protected $data = array(
		['id' => 1, 'name' => 'отрицательный'],
		['id' => 2, 'name' => 'положительный'],
	);

	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$this->seedingTable('ifa', $this->data);
	}

	public function seedingTable($table, $items)
	{
		foreach ($items as $item) {
			DB::table($table)->insert(['id' => $item['id'], 'name' => $item['name']]);
		}
	}
}
