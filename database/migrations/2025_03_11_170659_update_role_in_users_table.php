<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the role column if it doesn't exist
            if (!Schema::hasColumn('users', 'role')) {
                $table->tinyInteger('role')->default(1); // 1 for User, 2 for Admin
            }
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the role column in case you want to rollback
            $table->dropColumn('role');
        });
    }
    
};
