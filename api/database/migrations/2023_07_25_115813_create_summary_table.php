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
        Schema::create('summary', function (Blueprint $table) {
            $table->id();
            $table->string('surname')->nullable();
            $table->string('name')->nullable();
            $table->string('middlename')->nullable();
            $table->string('phonenumber')->nullable();
            $table->text('text')->nullable();
            $table->string('file');
            $table->bigInteger('vacancy_id')->nullable();
            $table->foreign('vacancy_id')->references('id')->on('vacancies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summary');
    }
};
