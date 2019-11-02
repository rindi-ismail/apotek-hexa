<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->uuid('pc_id');
            $table->string('pc_name');
            $table->string('pc_information');
            $table->string('pc_status');
            $table->timestamps();

            $table->primary('pc_id');
        });

        Schema::create('class_of_drugs', function (Blueprint $table) {
            $table->uuid('cod_id');
            $table->string('cod_name');
            $table->string('cod_information');
            $table->string('cod_status');
            $table->timestamps();

            $table->primary('cod_id');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->uuid('prd_id');
            $table->string('prd_name');
            $table->string('prd_indication');
            $table->string('prd_image_url');
            $table->uuid('pc_id');
            $table->uuid('cod_id');
            $table->timestamps();

            $table->primary('prd_id');
            $table->foreign('pc_id')->references('pc_id')->on('product_categories');
            $table->foreign('cod_id')->references('cod_id')->on('class_of_drugs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categories');
        Schema::dropIfExists('class_of_drugs');
        Schema::dropIfExists('products');
    }
}
