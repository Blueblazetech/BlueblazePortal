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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->string('surname');
            $table->string('gender');
            $table->string('marital_status'); 
            $table->string('contact_1');         
            $table->string('contact_2');
            $table->string('physical_address');          
            $table->string('email_address');
            $table->string('nationality');
            $table->string('resume');
            $table->string('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
