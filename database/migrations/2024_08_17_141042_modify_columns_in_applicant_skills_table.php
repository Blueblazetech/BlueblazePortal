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
        Schema::table('applicant_skills', function (Blueprint $table) {
            //

            $table->rename('applicant_skills', 'user_skills');
            $table->renameColumn('applicant_id', 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicant_skills', function (Blueprint $table) {
            //
            
        });
    }
};
