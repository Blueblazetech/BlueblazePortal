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
        Schema::table('jobs', function (Blueprint $table) {

            //
            $table->string('category_id');
            $table->string('posted_by');
            $table->string('age');
            $table->string('location_id');
            $table->string('experience');
            $table->string('salary_range');
            $table->string('qualifications');
            $table->string('benefits');
            $table->string('notes');
            $table->string('employment_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
        });
    }
};
