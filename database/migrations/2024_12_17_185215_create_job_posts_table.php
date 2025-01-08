<?php

use App\Enums\JobPostStateEnum;
use App\Enums\JobTypeEnum;
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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->text('description');
            $table->text('requirements');
            $table->decimal('salary')->nullable();
            $table->enum('job_type', JobTypeEnum::values());
            $table->enum('state', JobPostStateEnum::values())
                ->default(JobPostStateEnum::Open);

            $table->foreignId('recruiter_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('industry_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
