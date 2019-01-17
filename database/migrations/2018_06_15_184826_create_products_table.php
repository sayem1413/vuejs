<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Enumeration\ActiveStatus;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id');
            $table->integer('manufacturer_id');
            $table->decimal('price',13,2);
            $table->integer('quantity');
            $table->text('short_description',2000);
            $table->text('long_description');
            $table->string('image');
            $table->tinyInteger('active')->default(ActiveStatus::UNPUBLISHED);
            $table->timestamps();
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
            $table->foreign('manufacturer_id')
                  ->references('id')
                  ->on('manufacturers')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
