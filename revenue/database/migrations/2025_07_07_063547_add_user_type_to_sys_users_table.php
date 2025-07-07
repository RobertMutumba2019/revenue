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
        Schema::table('sys_users', function (Blueprint $table) {
            $table->string('user_type', 1)->default('V')->after('password'); // A = Admin, V = Viewer
        });
    }

    public function down(): void
    {
        Schema::table('sys_users', function (Blueprint $table) {
            $table->dropColumn('user_type');
        });
    }
};
