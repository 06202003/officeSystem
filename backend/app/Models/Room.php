<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory, Uuid;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */

    protected $primaryKey = "guid";

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
        'room_name', 'floor', 'office_guid', 'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'created_at',
        // 'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        // 'status' => StatusEnum::class
    ];
    /**
     * OFFICE OBJECT
     */
    public function office()
    {
        return $this->belongsTo(Office::class, 'office_guid', 'guid');
    }
    /**
     * OLD USAGE HISTORY OBJECT
     */
    public function usage_history_old()
    {
        return $this->hasMany(UsageHistory::class, 'old_room_guid', 'guid');
    }
    /**
     * NEW USAGE HISTORY OBJECT
     */
    public function usage_history_new()
    {
        return $this->hasMany(UsageHistory::class, 'new_room_guid', 'guid');
    }
}
