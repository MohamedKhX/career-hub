<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserTypeEnum;
use Filament\Forms\Components\Hidden;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'type' => UserTypeEnum::class,
        ];
    }

    public function recruiter(): BelongsTo
    {
        return $this->belongsTo(Recruiter::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function appliedTo(JobPost $jobPost): bool
    {
        return $this->applications()->where('job_post_id', $jobPost->id)->exists();
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function hasRating(Recruiter $recruiter): bool
    {
        return $this->ratings()->where('recruiter_id', $recruiter->id)->get()->isNotEmpty();
    }

    public function name(): Attribute
    {
        return new Attribute(function ($value) {
            if($this->first_name == null) {
                return $this->recruiter->company_name;
            }

            return $this->first_name . ' ' . $this->last_name;
        });
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin' && $this->type == UserTypeEnum::Admin) {
            return true;
        }

        if ($panel->getId() === 'recruiter' && $this->type == UserTypeEnum::Recruiter) {
            return true;
        }

        return false;
    }
}
