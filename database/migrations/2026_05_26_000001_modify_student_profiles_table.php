<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('student_profiles', function (Blueprint $table) {
            // Rename location to address
            $table->renameColumn('location', 'address');
            
            // Drop income_bracket column
            $table->dropColumn('income_bracket');
        });
    }

    public function down(): void
    {
        Schema::table('student_profiles', function (Blueprint $table) {
            // Reverse the rename
            $table->renameColumn('address', 'location');
            
            // Restore income_bracket column
            $table->string('income_bracket')->nullable();
        });
    }
};
