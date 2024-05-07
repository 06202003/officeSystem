<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
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
        'inventory_name', 'brand', 'purchase_date', 'price', 'residual_value', 'useful_life', 'depreciation', 'description', 'status', 'category_guid', 'user_guid', 'room_guid', 'price_in_year_1', 'price_in_year_2', 'price_in_year_3', 'price_in_year_4', 'vendor_guid', 'img_url',
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
     * USER OBJECT
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_guid', 'guid');
    }
    /**
     * ROOM OBJECT
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_guid', 'guid');
    }
    /**
     * CATEGORY OBJECT
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_guid', 'guid');
    }
    /**
     * USAGE HISTORY OBJECT
     */
    public function usages_history()
    {
        return $this->hasMany(UsageHistory::class, 'inventory_guid', 'guid');
    }
    /**
     * DAMAGE HISTORY OBJECT
     */
    public function damages_history()
    {
        return $this->hasMany(DamageHistory::class, 'inventory_guid', 'guid');
    }
    /**
     * VENDOR OBJECT
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
