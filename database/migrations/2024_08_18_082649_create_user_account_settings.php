<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_account_settings', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('city');
            $table->string('province');
            $table->string('is_available');
            $table->string('is_public');
            $table->string('is_active')->default(1);
            $table->string('job_preference');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_account_settings');
    }
};
