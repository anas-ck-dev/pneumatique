<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191)->notNullable();
            $table->string('code', 191)->notNullable();
            $table->string('type', 191)->notNullable();
            $table->string('barcode_symbology', 191)->notNullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->unsignedInteger('category_id')->notNullable();
            $table->unsignedInteger('unit_id')->notNullable();
            $table->unsignedInteger('purchase_unit_id')->notNullable();
            $table->unsignedInteger('sale_unit_id')->notNullable();
            $table->string('cost', 191)->notNullable();
            $table->string('price', 191)->notNullable();
            $table->double('qty')->nullable();
            $table->double('alert_quantity')->nullable();
            $table->tinyInteger('promotion')->nullable();
            $table->string('promotion_price', 191)->nullable();
            $table->string('starting_date', 200)->nullable();
            $table->date('last_date')->nullable();
            $table->unsignedInteger('tax_id')->nullable();
            $table->unsignedInteger('tax_method')->nullable();
            $table->longText('image')->nullable();
            $table->string('file', 191)->nullable();
            $table->tinyInteger('is_variant')->nullable();
            $table->tinyInteger('featured')->nullable();
            $table->string('product_list', 191)->nullable();
            $table->string('qty_list', 191)->nullable();
            $table->string('price_list', 191)->nullable();
            $table->text('product_details')->nullable();
            $table->tinyInteger('is_active')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('purchase_unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('sale_unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('tax_id')->references('id')->on('taxes')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
