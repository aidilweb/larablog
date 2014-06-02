<?php

class SettingTableSeeder extends Seeder {

	public function run()
	{
		DB::table('settings')->delete();

		Setting::create(array(
				'title' => 'Larablog',
				'slogan' => 'A Blog Create From Laravel',
				'footer' => 'Copyright &copy; Larablog 2014'
			));

		
	}
}