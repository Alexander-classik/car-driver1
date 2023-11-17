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
        Schema::create('table_car', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('year', 5);
            $table->mediumText('description');
            $table->bigInteger('driver_id')->unsigned();
            $table->bigInteger('mark_id')->unsigned();
            $table->string('img')->default('default/default.jpg');
            $table->foreign('mark_id')->references('id')->on('mark')->onDelete('cascade');
            $table->foreign('driver_id')->references('id')->on('table_drivers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_car');
    }
};
