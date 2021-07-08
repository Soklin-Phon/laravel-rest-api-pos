<?php

use Illuminate\Database\Seeder;

class SetupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{

        DB::table('setting')->insert(
            [
                [ 'discount' => 0, 'usd_rate' => 4000]
            ]);
        
   
        
        DB::table('expenses_type')->insert(
        [
            [ 'name' =>'Barverage Stock-in'],
            [ 'name' =>'Salary'],
            [ 'name' =>'Water'],
            [ 'name' =>'Eletricity'],
        ]);
        
        


	}
}
