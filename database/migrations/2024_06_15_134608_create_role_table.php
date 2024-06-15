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
        Schema::create('role', function (Blueprint $table) {
            $table->string('role_id', 2)->primary();
            $table->string('role_name', 255);
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('role')->insert([
            [
                'role_id' => '01',
                'role_name' => 'admin',
            ],[
                'role_id' => '02',
                'role_name' => 'user',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role');
    }
};
