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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('headquarter')->nullable();
            $table->string('ceo')->nullable();
            $table->string('insceptiondate')->nullable();
            $table->string('mosthearedbrand')->nullable();
            $table->string('totalassets')->nullable();
            $table->string('companynumber')->nullable();
            $table->text('history')->nullable();
            $table->string('namarketshareimageme')->nullable();
            $table->text('marketshare')->nullable();
            $table->text('competitoranalysis')->nullable();
            $table->string('metatitle')->nullable();
            $table->string('metakeywords')->nullable();
            $table->string('metadescription')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
