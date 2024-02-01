<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subservices', function (Blueprint $table) {
            $table->id();
            $table->text('title')->fulltext();
            $table->string('image')->nullable();
            $table->integer('price');
            $table->text('description')->nullable();
            $table->bigInteger('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services');
            $table->timestamps();
            $table->integer('sort_order');
        });

        DB::statement('UPDATE subservices SET sort_order = id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subservices');
    }
};
