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
    Schema::create('vehicles', function (Blueprint $table) {
        $table->id('settings_id');
        $table->integer('settings_fuel_request_validity')->nullable();
        $table->decimal('settings_fuel_consumption', 8, 2)->nullable();
        $table->integer('settings_vehicle_request_validity')->nullable();
        $table->decimal('settings_dialy_distance_territory', 8, 2)->nullable();
        $table->integer('settings_expiry_reminder')->nullable();
        $table->integer('settings_radius_out_of_kampala')->nullable();
        $table->timestamp('settings_date_added')->nullable();
        $table->unsignedBigInteger('settings_added_by')->nullable();
        $table->timestamps();
    });
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
