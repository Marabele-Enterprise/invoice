<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('logo', 255)->nullable();
            $table->string('domain', 255)->nullable();
            $table->string('email')->unique();
            $table->integer('address_id')->unsigned();
            $table->string('telephone', 20)->unique()->nullable();
            $table->string('mobile', 20)->unique()->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('vat_number', 30)->unique()->nullable();
            $table->string('registration_number', 100);
            $table->text('invoice_footer')->nullable();
            $table->text('invoice_note')->nullable();
            $table->string('invoice_email_subject', 100);
            $table->text('invoice_email_body');
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
        Schema::drop('company_details');
    }
}
