<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(SetupTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BranchTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(SupplierTableSeeder::class);
        $this->call(OrderTableSeeder::class);
       
    }
}
