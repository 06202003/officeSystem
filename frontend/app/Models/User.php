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
        'role_guid',
        'position_guid',
        'department_guid',
        'division_guid',
        'fcm_token',
        'nik',
        'name',
        'email',
        'phone_number',
        'type',
        'password',
        'status',
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
    ];

    /**
     * ROLE OBJECT
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_guid');
    }

    /**
     * POSITION OBJECT
     */
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_guid');
    }

    /**
     * DEPARTMENT OBJECT
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_guid');
    }

    /**
     * DIVISION OBJECT
     */
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_guid');
    }
}