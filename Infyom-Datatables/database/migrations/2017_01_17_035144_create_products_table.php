<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateproductsTable extends Migration
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
            $table->string('productCode');
            $table->string('productName');
            $table->integer('unit');
            $table->text('note');
            $table->integer('stock');
            $table->text('image');
            $table->integer('status');
            $table->date('createdDate');
            $table->integer('createdUserID');
            $table->date('modifiedDate');
            $table->integer('modifiedUserID');
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
        Schema::drop('products');
    }
}
