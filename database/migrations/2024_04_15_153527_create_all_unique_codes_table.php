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
        Schema::create('all_unique_codes', function (Blueprint $table) {
            $table->id();
            $table->char('my_uniqueid',50)->unique();
            $table->char('provider',100)->nullable();
            $table->char('title',250)->nullable();
            $table->text('site_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_unique_codes');
    }
};
