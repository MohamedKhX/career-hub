<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Industry extends Model
{
    /** @use HasFactory<\Database\Factories\IndustryFactory> */
    use HasFactory;

    protected $guarded = [];

    public function jobPosts(): HasMany
    {
        return $this->hasMany(JobPost::class);
    }
}
