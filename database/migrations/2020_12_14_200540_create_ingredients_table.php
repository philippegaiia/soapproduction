<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ingredient_category_id')->constrained();
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('name_en');
            $table->string('inci');
            $table->string('inci_naoh')->nullable();
            $table->string('inci_koh')->nullable();
            $table->string('cas')->nullable();
            $table->string('cas_einecs')->nullable();
            $table->string('einecs')->nullable();
            $table->smallInteger('active');
            $table->text('infos')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => IngredientSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
