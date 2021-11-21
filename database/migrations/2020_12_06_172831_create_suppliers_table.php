<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->string('customer_no')->nullable();
            $table->string('code');
            $table->string('name');
            $table->smallInteger('active');
            $table->string('contact');
            $table->string('email');
            $table->string('tel');
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->text('infos')->nullable();
            $table->string('www')->nullable();
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => SupplierSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
