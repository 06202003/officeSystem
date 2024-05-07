<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserStatusEnum;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, Uuid, HasRoles, HasPermissions;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'guid';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'position_guid',
        'department_guid',
        'division_guid',
        'fcm_token',
        'id_employee',
        'name',
        'email',
        'phone_number',
        'photo_url',
        'password',
        'status',
        'type',
        'nik',
        'birth_city',
        'birth_date',
        'gender',
        'religion',
        'npwp',
        'information',
        'bank_account',
        'signature_url'
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
        'status' => UserStatusEnum::class
    ];

    /**
     * POSITION OBJECT
     */
    public function position()
    {
        return $this->belongsTo(Position::class,);
    }

    /**
     * DEPARTMENT OBJECT
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * DIVISION OBJECT
     */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }




    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * PRODUCT OBJECT
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    /**
     * INVENTORY OBJECT
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
    /**
     * USAGE HISTORY OLD OBJECT
     */
    public function usages_history_old()
    {
        return $this->hasMany(UsageHistory::class, 'user_old_guid', 'guid');
    }
    /**
     * USAGE HISTORY NEW OBJECT
     */
    public function usages_history_new()
    {
        return $this->hasMany(UsageHistory::class, 'user_new_guid', 'guid');
    }

    /**
     * LEAVE ALLOCATION OBJECT
     */
    public function leaveAllocations()
    {
        return $this->hasMany(LeaveAllocation::class, 'user_guid', 'guid');
    }
}
