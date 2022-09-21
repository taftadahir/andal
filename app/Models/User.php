<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    public const DATE_FORMAT = 'M d, Y';
    // Traits
    use HasApiTokens, HasFactory, Notifiable;

    // Properties
    public const ROLE_ADMIN = 'admin';
    public const ROLE_SUBSCRIBER = 'subscriber';

    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'deleted_at',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->format(User::DATE_FORMAT) : null,
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->format(User::DATE_FORMAT) : null,
        );
    }

    // Scopes
    public function scopeAdmin($query)
    {
        $query->where('role', User::ROLE_ADMIN);
    }

    // Relationships
    public function articles()
    {
        return $this->hasMany(Article::class, 'author');
    }
}
