<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->nullable();
            $table->string('alt')->nullable();
            $table->string('metatitle')->nullable();
            $table->string('metakeywords',600)->nullable();
            $table->string('metadescription',600)->nullable();
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
        Schema::dropIfExists('products');
    }
};
