<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('listing_id')->constrained()->nullable();
            $table->string('batch_no')->nullable();
            $table->integer('price')->nullable();
            $table->float('qty',7,2);
            $table->date('expiry_date')->nullable();
            $table->smallInteger('active');
            $table->softDeletes();
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => SupplySeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplies');
    }
}
