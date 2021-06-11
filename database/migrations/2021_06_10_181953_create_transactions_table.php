<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->uuid( 'unique_id' );

            $table->integer( 'transaction_type_id' )->unsigned();
            $table->integer( 'agent_id' )->unsigned()->nullable();
            $table->integer( 'user_id' )->unsigned()->nullable();
            $table->integer( 'product_id' )->unsigned()->nullable();
            $table->string( 'product_serial', 512 )->nullable();
            $table->dateTime( 'rental_start' )->nullable();
            $table->dateTime( 'rental_end' )->nullable();
            $table->decimal( 'transaction_amount', $precision = 13, $scale = 4 )->nullable();
            $table->string( 'unregistered_user_firstname', 64 )->nullable();
            $table->string( 'unregistered_user_lastname', 64 )->nullable();
            $table->string( 'unregistered_user_phone', 13 )->nullable();


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
        Schema::dropIfExists('transactions');
    }
}
