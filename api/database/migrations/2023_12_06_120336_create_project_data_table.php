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
        Schema::create('project_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->string('title');
            $table->string('value');
            $table->integer('sort_order');
            $table->timestamps();
        });

        DB::statement('UPDATE projects SET sort_order = id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_data');
    }
};
