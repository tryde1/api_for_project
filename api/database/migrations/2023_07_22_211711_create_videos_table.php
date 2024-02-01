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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();
            $table->integer('sort_order');
            $table->string("preview")->nullable();
        });

        DB::statement('UPDATE services SET sort_order = id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
