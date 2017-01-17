<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssigmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigments', function (Blueprint $table) {
            $table->increments('assigment_id');
            $table->date('assigment_date');
            $table->integer('task_id');
            $table->integer('sales_id');
            $table->integer('customer_id');
            $table->string('status');
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
        Schema::drop('assigments');
    }
}
