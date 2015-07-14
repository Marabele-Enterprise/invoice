<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->integer('invoice_id')->unsigned();
            $table->timestamps();

            $table->foreign('item_id')
                ->references('id')->on('items')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('invoice_id')
                ->references('id')->on('invoices')
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
        Schema::drop('items_lists');
    }
}
