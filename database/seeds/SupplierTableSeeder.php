<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{

        // =========================================================>> Add Supplier
        $x = [
                [ 
                    'name' => 'Attwood', 
                    'phone' => '099882223', 
                    'address' => 'St. 2020'
                ], 

                [ 
                    'name' => 'Khmer Berverage', 
                    'phone' => '099882223', 
                    'address' => 'St. 2020'
                ], 

                [ 
                    'name' => 'Angkor', 
                    'phone' => '099882223', 
                    'address' => 'St. 2020'
                ]

            ]; 
        DB::table('supplier')->insert($x);
        
        // =========================================================>> Supplier Suppler all products
        $products = DB::table('product')->get(); 
        $suppliers = DB::table('supplier')->get(); 
        $data = []; 

        foreach($products as $product){
            foreach($suppliers as $supplier){
                $data[] = [
                    'product_id' => $product->id, 
                    'supplier_id' => $supplier->id, 
                    'price' => rand(10, 35)
                ]; 
            }
            
        }

        DB::table('supplier_product')->insert($data);
        

      
	}
}
