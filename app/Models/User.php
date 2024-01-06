<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getRedirectRouteName()
    {
        $roles = $this->roles;

        if ($roles->contains('title', Role::ROLES['Admin'])) {
            return 'admin.dashboard';
        }

        if ($roles->contains('title', Role::ROLES['Teacher'])) {
            return 'teacher.dashboard';
        }

        if ($roles->contains('title', Role::ROLES['Student'])) {
            return 'student.dashboard';
        }
    }

    public function hasRole(string $role): bool
    {
        return $this->roles()->where('title', $role)->exists();
    }
}
