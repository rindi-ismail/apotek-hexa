<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_units', function (Blueprint $table) {
            $table->uuid('pu_id');
            $table->uuid('prd_id');
            $table->string('pu_unit');
            $table->uuid('parent_pu_id');
            $table->string('pu_convertion');
            $table->timestamps();

            $table->primary('pu_id');
            $table->unique(array('prd_id','pu_unit'));
            $table->foreign('prd_id')->references('prd_id')->on('products');
            $table->foreign('parent_pu_id')->references('pu_id')->on('product_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_units');
    }
}
