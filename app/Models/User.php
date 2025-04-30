<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Ensure 'role' is included in fillable attributes
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationship: a user has many saved designs
    public function savedDesigns()
    {
        return $this->hasMany(SavedDesigns::class);
    }

    // Check if user is an admin
    public function isAdmin()
    {
        return $this->role === 'admin'; // Make sure 'role' exists in your database
    }
}
