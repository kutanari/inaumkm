<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('number_of_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('label');
            $table->smallInteger('min');
            $table->smallInteger('max');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('number_of_employees');
    }
};
