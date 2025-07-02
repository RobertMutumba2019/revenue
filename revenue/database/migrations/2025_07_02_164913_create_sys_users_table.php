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
        Schema::create('sys_users', function (Blueprint $table) {
        
        $table->id();
        $table->string('surname');
        $table->string('othername')->nullable();
        $table->string('telephone');
        $table->string('email')->unique();
        $table->unsignedBigInteger('gender_id')->nullable();
        $table->unsignedBigInteger('department_id');
        $table->string('username')->unique();
        $table->unsignedBigInteger('designation_id');
        $table->string('password');
        $table->timestamps();

        // Add foreign keys if you want:
        // $table->foreign('gender_id')->references('id')->on('genders');
        // $table->foreign('department_id')->references('id')->on('departments');
        // $table->foreign('designation_id')->references('id')->on('designations');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sys_users');
    }
};
