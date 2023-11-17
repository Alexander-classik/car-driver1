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
        Schema::create('table_drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->bigInteger('type_driver_id')->unsigned();
            $table->integer('price');
            $table->integer('number');
            $table->mediumText('description');
            $table->string('img')->default('default/driver.png');
            $table->foreign('type_driver_id')->references('id')->on('table_type_driver')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_drivers');
    }
};
