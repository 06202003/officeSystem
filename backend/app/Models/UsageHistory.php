<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsageHistory extends Model
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
        'old_user_guid', 'new_user_guid', 'date',  'status', 'old_room_guid', 'new_room_guid', 'inventory_guid'
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
     * INVENTORY OBJECT
     */
    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_guid', 'guid');
    }
    /**
     * OLD ROOM OBJECT
     */
    public function old_room()
    {
        return $this->belongsTo(Room::class, 'old_room_guid', 'guid');
    }
    /**
     * NEW ROOM OBJECT
     */
    public function new_room()
    {
        return $this->belongsTo(Room::class, 'new_room_guid', 'guid');
    }
    /**
     * OLD USER OBJECT
     */
    public function old_user()
    {
        return $this->belongsTo(User::class, 'old_user_guid', 'guid');
    }
    /**
     * NEW USER OBJECT
     */
    public function new_user()
    {
        return $this->belongsTo(User::class, 'new_user_guid', 'guid');
    }
}
