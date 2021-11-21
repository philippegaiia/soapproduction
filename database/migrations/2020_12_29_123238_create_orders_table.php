<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained();
            $table->string('order_ref');
            $table->date('order_date');
            $table->date('delivery_date')->nullable();
            $table->string('confirmation_no')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('bl_no')->nullable();
            $table->unsignedInteger('amount');
            $table->unsignedInteger('freight');
            $table->smallInteger('active');
            $table->text('infos')->nullable();
            $table->softdeletes();
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => OrderSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
