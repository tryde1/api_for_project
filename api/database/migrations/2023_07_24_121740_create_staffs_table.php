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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('name');
            $table->string('middlename');
            $table->bigInteger('position_id');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('staffs');
    }
};
