<?php

use Illuminate\Database\Seeder;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{

        // =========================================================>> Add Branch
        DB::table('branch')->insert(
            [
                [ 
                    'name' => 'Phnom Penh', 
                    'phone' => '099882223', 
                    'address' => 'St. 2020'
                ], 

                [ 
                    'name' => 'Kompong Cham', 
                    'phone' => '099882223', 
                    'address' => 'St. 2020'
                ], 

                [ 
                    'name' => 'Siem Reap', 
                    'phone' => '099882223', 
                    'address' => 'St. 2020'
                ],

                [ 
                    'name' => 'Sihaknouk', 
                    'phone' => '099882223', 
                    'address' => 'St. 2020'
                ], 

                
            ]);
        
        // =========================================================>> Assign Admin for Branch
        DB::table('branch_admin')->insert([
            [ 'branch_id' =>1, 'admin_id' =>2, 'role_id' => 1 ], 
            [ 'branch_id' =>1, 'admin_id' =>3, 'role_id' => 2 ], 
            [ 'branch_id' =>1, 'admin_id' =>4, 'role_id' => 2 ],
            [ 'branch_id' =>1, 'admin_id' =>5, 'role_id' => 2 ], 
        ]);
        

      
	}
}
