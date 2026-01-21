<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    Schema::table('users', function (Blueprint $table) {
        // Kita beri default 'customer' agar user baru otomatis punya role dasar
        $table->string('role')->default('customer')->after('password');
    });
}

public function down(): void {
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('role');
    });
}
};
