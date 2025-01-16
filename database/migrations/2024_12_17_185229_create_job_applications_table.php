<?php

use App\Enums\JobApplicationStateEnum;
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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->text('cover_letter');
            /*$table->enum('state', JobApplicationStateEnum::values())
                ->default(JobApplicationStateEnum::Pending->value);*/

            $table->string('first_name', 100);
            $table->string('middle_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 100);
            $table->string('phone', 100);
            $table->date('date_of_birth');

            $table->string('place_of_residence', 100)->nullable();

            $table->integer('years_of_experience')->nullable();
            $table->decimal('expected_salary', 10, 2)->nullable();

            $table->foreignId('job_post_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
