<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamageHistory extends Model
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
        'repair_date', 'repair_cost', 'description', 'date_of_damage', 'status', 'completion_date_of_repair', 'vendor_guid', 'inventory_guid', 'user_repair_guid', 'user_last_guid'
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
     * USER REPAIR OBJECT
     */
    public function user_repair()
    {
        return $this->belongsTo(User::class, 'user_repair_guid', 'guid');
    }
    /**
     * USER LAST OBJECT
     */
    public function user_last()
    {
        return $this->belongsTo(User::class, 'user_last_guid', 'guid');
    }

    /**
     * VENDOR OBJECT
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
