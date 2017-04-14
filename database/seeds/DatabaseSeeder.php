<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Offering;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	  Offering::create([
			'title' => 'Dunkin Helmet',
			'price' => '1599'
			
		]);
		Offering::create([
			'title' => 'Beast Helmet',
			'price' => '1499'
			
		]);
		Offering::create([
			'title' => 'Rider Jacket',
			'price' => '2099'
			
		]);	
	}	
	

}
