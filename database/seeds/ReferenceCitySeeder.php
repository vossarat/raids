<?php

use Illuminate\Database\Seeder;

class ReferenceCitySeeder extends Seeder
{
    protected $data = array(
		['id' =>0,'name'=>'область'],
		['id' =>1,'name'=>'город'],
	);

	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$this->seedingTable('city', $this->data);
	}

	public function seedingTable($table, $items)
	{
		foreach ($items as $item) {
			DB::table($table)->insert(['id' => $item['id'], 'name' => $item['name']]);
		}
	}
}
