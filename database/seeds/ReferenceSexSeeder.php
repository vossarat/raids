<?php

use Illuminate\Database\Seeder;

class ReferenceSexSeeder extends Seeder
{
    protected $data = array(
		['id' =>1,'name'=>'не указано'],
		['id' =>2,'name'=>'мужской'],
		['id' =>3,'name'=>'женский'],
	);

	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$this->seedingTable('sex', $this->data);
	}

	public function seedingTable($table, $items)
	{
		foreach ($items as $item) {
			DB::table($table)->insert(['id' => $item['id'], 'name' => $item['name']]);
		}
	}
}
