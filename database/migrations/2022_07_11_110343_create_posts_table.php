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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',600)->nullable();
            $table->string('slug',600)->nullable();
            $table->string('image',600)->nullable();
            $table->string('alt')->nullable();
            $table->integer('category_id')->nullable();
            $table->boolean('status')->nullable();
            $table->text('description')->nullable();
            $table->string('metatitle',600)->nullable();
            $table->string('metadescription',600)->nullable();
            $table->string('metakeywords',600)->nullable();
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
        Schema::dropIfExists('posts');
    }
};
