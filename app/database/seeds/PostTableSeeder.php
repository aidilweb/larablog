<?php

class PostTableSeeder extends Seeder {

	public function run()
	{
		DB::table('posts')->delete();

		Post::create(array(
				'category_id' => '1',
				'title' => 'Hello World',
				'content' => '<p>Larablog is a another  CMS Blog create with Laravel Framework</p>',
				'status' => 'publish'
			));

		
	}
}