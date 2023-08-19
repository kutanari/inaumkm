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
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('founder_name')->nullable();
            $table->longText('address')->nullable();
            $table->string('latlong')->nullable();
            $table->string('province')->nullable();
            $table->longText('description')->nullable();
            $table->string('website_url')->nullable();
            $table->string('slug')->unique();
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('established_year')->nullable();
            $table->string('logo_picture')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('youtube_video_url')->nullable();
            $table
                ->string('business_type')
                ->default('pt')
                ->nullable();
            $table->unsignedBigInteger('number_of_employee_id')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('subdistrict')->nullable();
            $table->json('tags')->nullable();
            $table->string('source')->nullable();
            $table->string('nib')->nullable();
            $table->string('npwp')->nullable();
            $table->string('no_akta')->nullable();
            $table->string('siup')->nullable();
            $table->json('other_certifications')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
