<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->id();
            $table->foreignId('product_subcategory_id')->constrained();
            $table->foreignId('product_collection_id')->constrained();
            $table->string('code');
            $table->string('name');
            $table->string('brand');
            $table->date('launch_date');
            $table->boolean('essential_oils');
            $table->boolean('extracts');
            $table->float('net_weight',7,3);
            $table->float('gross_weight',7,3);
            $table->string('ean_code')->nullable();
            $table->string('wp_code')->nullable();
            $table->text('infos')->nullable();
            $table->smallInteger('active');
            $table->softDeletes();
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => ProductSeeder::class
        ]);
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
