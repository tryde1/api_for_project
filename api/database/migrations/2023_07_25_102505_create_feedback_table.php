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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('authorname');
            $table->text('text')->fulltext();
            $table->string('video')->nullable();
            $table->string('photo')->nullable();
            $table->string('video_preview')->nullable();
            $table->string('source')->nullable();
            $table->string('source_url')->nullable();
            $table->boolean('show')->default('false');
            $table->timestamps();
            $table->integer('sort_order');
        });

        DB::statement('UPDATE services SET sort_order = id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
