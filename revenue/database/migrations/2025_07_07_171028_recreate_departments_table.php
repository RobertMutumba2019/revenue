<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::dropIfExists('departments'); // Drop if exists

        Schema::create('departments', function (Blueprint $table) {
            $table->id('dept_id');
            $table->string('dept_name')->unique();
            $table->unsignedBigInteger('dept_office_id')->default(0);
            $table->boolean('dept_status')->default(1);
            $table->timestamp('dept_date_added')->nullable();
            $table->unsignedBigInteger('dept_added_by')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
