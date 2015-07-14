<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('email', 50)->unique();
            $table->integer('address_id')->unsigned();
            $table->string('telephone', 20)->unique()->nullable();
            $table->string('fax', 20)->unique()->nullable();
            $table->string('mobile', 20)->unique()->nullable();
            $table->string('website', 30)->nullable();
            $table->string('vat_number', 30)->unique()->nullable();
            $table->text('background')->nullable();
            $table->timestamps();

            $table->foreign('address_id')
                ->references('id')->on('addresses')
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
        Schema::drop('clients');
    }
}
