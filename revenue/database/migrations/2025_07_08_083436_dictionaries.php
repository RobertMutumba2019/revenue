<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dictionaries', function (Blueprint $table) {
            $table->id('d_id');
            $table->string('d_name');
            $table->text('d_description')->nullable();
            $table->string('d_code')->nullable();
            $table->unsignedBigInteger('d_category');
            $table->unsignedBigInteger('d_added_by')->nullable();
            $table->timestamp('d_date_added')->useCurrent();
            $table->foreign('d_category')->references('id')->on('dictionary_categories')->onDelete('cascade');
            $table->foreign('d_added_by')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dictionaries');
    }
};