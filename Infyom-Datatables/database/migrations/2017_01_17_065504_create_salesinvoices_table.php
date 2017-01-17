<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesalesinvoicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesinvoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoiceNo');
            $table->date('invoiceDate');
            $table->integer('soID');
            $table->integer('status');
            $table->integer('paymentType');
            $table->date('expiredPayment');
            $table->integer('ppn');
            $table->double('total');
            $table->double('discount');
            $table->double('grandtotal');
            $table->integer('customerID');
            $table->string('customerName');
            $table->text('customerAddress');
            $table->integer('staffID');
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
        Schema::drop('salesinvoices');
    }
}
