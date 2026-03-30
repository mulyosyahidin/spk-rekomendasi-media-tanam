<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\UserRole;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, UserRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
        ];
    }

    /**
     * Get the URL of the user's profile picture.
     *
     * This accessor method generates the full URL for the user's profile picture.
     * If the user has uploaded a profile picture, it returns the URL to that image.
     * If not, it returns the URL to a default profile picture.
     *
     * @return Attribute The accessor attribute for the profile picture URL.
     */
    public function profilePictureUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => asset($this->profile_picture ?: 'assets/images/default-profile-picture.jpg')
        );
    }

    /**
     * Get the perhitungans for the user.
     *
     * @return HasMany The relationship attribute for perhitungans.
     */
    public function perhitungans(): HasMany
    {
        return $this->hasMany(Perhitungan_user::class, 'user_id');
    }
}
