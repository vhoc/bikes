<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();

            $table->integer( 'product_type_id' )->unsigned();
            $table->integer( 'product_brand_id' )->unsigned();
            $table->string( 'model' );
            $table->year( 'year_model' );
            $table->string( 'serial' );
            $table->string( 'wheel_size' );
            $table->integer( 'color_id' )->unsigned();
            $table->string( 'description', 512 );

            $table->json( 'images' )->nullable();

            $table->json( 'acquired' )->nullable();

            $table->date( 'last_maintenance' )->nullable();
            $table->date( 'due_maintenance' )->nullable();

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
        Schema::dropIfExists('products');
    }
}
