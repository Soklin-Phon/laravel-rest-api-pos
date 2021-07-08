<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            
            $table->increments('id', 11);
            $table->string('name', 150)->default('');
            $table->string('image', 500)->nullable();

            $table->integer('type_id')->unsigned()->default(1);
            $table->foreign('type_id')->references('id')->on('products_type');

            $table->decimal('unit_price', 10, 2)->default(5000);
            $table->decimal('discount', 10, 2)->default(0);
           
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
