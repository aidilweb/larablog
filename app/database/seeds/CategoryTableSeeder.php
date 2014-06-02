<?php

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		DB::table('categories')->delete();

		Category::create(array(
				'name' => 'Uncategories'
			));

		
	}
}