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
        Schema::create('applicatoins', function (Blueprint $table) {
            $table->id();
            $table->string('application_id')->nullable();
            $table->string('destination')->nullable();
            $table->string('visa_type')->nullable();
            $table->integer('total')->nullable();
            $table->integer('advance')->nullable();
            $table->integer('pending')->nullable();
            $table->integer('client_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicatoins');
    }
};
