<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulas', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('ref_dip');
            $table->string('name');
            $table->date('start_date');
            $table->text('infos')->nullable();
            $table->smallInteger('active');
            $table->softDeletes();
            $table->timestamps();
        });
        Artisan::call('db:seed', [
            '--class' => FormulaSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulas');
    }
}
