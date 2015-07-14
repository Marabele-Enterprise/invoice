<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference')->unique();
            $table->integer('client_id')->unsigned();
            $table->double('discount', 3, 1);
            $table->double('vat_rate', 3, 1);
            $table->decimal('sub_total', 10, 3);
            $table->decimal('total', 10, 3);
            $table->decimal('balance', 10, 3);
            $table->timestamp('date_settled')->nullable();
            $table->boolean('paid');
            $table->timestamps();

            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onUpdate('cascade')
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
        Schema::drop('invoices');
    }
}
