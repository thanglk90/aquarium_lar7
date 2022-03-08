<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->text('seo_desc')->nullable();
            $table->text('introduce')->nullable();
            $table->text('description')->nullable();
            $table->string('thumb')->nullable();
            $table->integer('price');
            $table->integer('sale_price')->nullable()->default(0);
            $table->integer('category_id');
            $table->integer('store')->nullable()->default(1);
            $table->integer('guarantee')->nullable()->default(0);
            $table->string('status')->default('active');
            $table->string('created_at')->default(date('d-m-Y H:i:s', time()));
            $table->string('updated_at')->default(date('d-m-Y H:i:s', time()));
            
            // $table->timestamps();
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
