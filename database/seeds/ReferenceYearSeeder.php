<?php

use Illuminate\Database\Seeder;

class ReferenceYearSeeder extends Seeder
{
	protected $data = array(
		['id' =>2015,'name'=>'2015'],
		['id' =>2016,'name'=>'2016'],
		['id' =>2017,'name'=>'2017'],
	);

	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$this->seedingTable('year', $this->data);
	}

	public function seedingTable($table, $items)
	{
		foreach ($items as $item) {
			DB::table($table)->insert(['id' => $item['id'], 'name' => $item['name']]);
		}
	}
}
