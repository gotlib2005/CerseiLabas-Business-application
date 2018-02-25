<?php

use Illuminate\Database\Seeder;
use Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('clients')->insert([
		    'name' => str_random(10),
		    'email' => str_random(10).'@gmail.com',
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
	    ]);
    }
}
