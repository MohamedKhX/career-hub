<?php

use App\Enums\Rating;
use App\Enums\RatingEnum;
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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->text('review');
            $table->enum('rating', RatingEnum::values());
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('recruiter_id')->constrained('recruiters');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
