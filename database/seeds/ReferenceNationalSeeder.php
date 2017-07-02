<?php

use Illuminate\Database\Seeder;

class ReferenceNationalSeeder extends Seeder
{
    protected $data = array(
		['id' => 0, 'name' => 'не указано'],
		['id' => 1, 'name' => 'коренная'],
		['id' => 2, 'name' => 'не коренная'],
	);

	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$this->seedingTable('national', $this->data);
	}

	public function seedingTable($table, $items)
	{
		foreach ($items as $item) {
			DB::table($table)->insert(['id' => $item['id'], 'name' => $item['name']]);
		}
	}
}
