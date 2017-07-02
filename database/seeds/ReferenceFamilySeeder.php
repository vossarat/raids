<?php

use Illuminate\Database\Seeder;

class ReferenceFamilySeeder extends Seeder
{
    protected $data = array(
		['id' => 0, 'name' => 'нет данных'],
		['id' => 1, 'name' => 'не женат/не замужем'],
		['id' => 2, 'name' => 'женат/замужем'],
	);

	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$this->seedingTable('family', $this->data);
	}

	public function seedingTable($table, $items)
	{
		foreach ($items as $item) {
			DB::table($table)->insert(['id' => $item['id'], 'name' => $item['name']]);
		}
	}
}
