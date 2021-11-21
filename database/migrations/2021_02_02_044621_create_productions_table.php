<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formula_id')->constrained();
            $table->string('code');
            $table->date('production_date');
            $table->date('ready_date');
            $table->float('oil_qty',7,3)->nullable();
            $table->float('total_qty',7,3)->nullable();
            $table->boolean('masterbatch');
            $table->boolean('cosmecert');
            $table->smallInteger('status');
            $table->text('infos')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('productions');
    }
}
