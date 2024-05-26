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
        Schema::create('v1_car_details_logs', function (Blueprint $table) {
            $table->id();
            $table->char('provider',100);
            $table->char('my_uniqueid',50)->unique();
            $table->char('uniqueid',100)->unique();
            $table->text('site_url',500);
            $table->json('details',250)->nullable();
            $table->char('manufacturer',100)->nullable();
            $table->char('model',100)->nullable();
            $table->unsignedSmallInteger('yom')->nullable();
            $table->float('mileage',10,2)->nullable();
            $table->float('amount',10,2)->nullable();
            $table->char('contact',15)->nullable();
            $table->char('place',150)->nullable();
            $table->datetime('posted_on')->nullable();
            $table->char('title',250);
            $table->text('options')->nullable();
            $table->text('condion')->nullable();
            $table->text('location')->nullable();
            $table->text('location_group')->nullable();
            $table->unsignedTinyInteger('status')->default(0); // 0=>pending,1=>contacted,2=>prority,3=>visited,7=>trace,8=>notavailable
            $table->json('log')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v1_car_details_logs');
    }
};
