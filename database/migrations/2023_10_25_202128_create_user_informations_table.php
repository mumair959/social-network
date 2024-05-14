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
        Schema::create('user_informations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('introduction',500)->nullable();
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->string('contact_no')->nullable()->unique();
            $table->string('profile_image',500)->default('/assets/images/user/12.jpg');
            $table->string('banner_image',500)->default('/assets/images/page-img/profile-bg1.jpg');
            $table->timestamp('date_of_birth')->nullable();
            $table->string('facebook',1000)->nullable();
            $table->string('twitter',1000)->nullable();
            $table->string('linkedin',1000)->nullable();
            $table->string('instagram',1000)->nullable();
            $table->string('youtube',1000)->nullable();
            $table->foreignId('city_id')->nullable()->constrained();
            $table->foreignId('country_id')->nullable()->constrained();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_informations');
    }
};
