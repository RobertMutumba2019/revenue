<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dictionary_categories', function (Blueprint $table) {
            $table->id();
            $table->string('dc_name');
            $table->unsignedBigInteger('dc_added_by')->nullable();
            $table->timestamp('dc_date_added')->useCurrent();
            $table->foreign('dc_added_by')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dictionary_categories');
    }
};