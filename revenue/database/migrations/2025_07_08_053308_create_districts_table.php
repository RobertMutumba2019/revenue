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
        
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('district_name')->unique();
            $table->string('district_code')->unique();
            $table->timestamp('district_date_added')->nullable();
            $table->foreignId('district_added_by')->constrained('sys_users')->onDelete('cascade');
            $table->timestamps(); // Includes created_at and updated_at
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};

