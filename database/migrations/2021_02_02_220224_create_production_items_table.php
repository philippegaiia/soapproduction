<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_id')->constrained();
            $table->foreignId('ingredient_id')->constrained();
            $table->foreignId('supply_id')->nullable()->constrained();
            $table->float('percentoils_dip',6,3)->nullable();
            $table->float('percentoils_real',6,3)->nullable();
            $table->float('percenttotal_dip',6,3)->nullable();
            $table->float('percenttotal_real',6,3)->nullable();
            $table->boolean('organic')->nullable();
            $table->smallInteger('phase')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_items');
    }
}
