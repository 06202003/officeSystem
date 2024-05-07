<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory, Uuid;

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

    protected $fillable = [
        'card_name',
        'description',
        'deadline',
        'order',
        'status',
        'catalog_guid',
        'img_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at'
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
     * CATALOG OBJECT
     */
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

    /**
     * USER CARD OBJECT
     */
    public function user_card()
    {
        return $this->hasMany(UserCard::class);
    }
    /**
     * CHECKLIST OBJECT
     */
    public function checklist()
    {
        return $this->hasMany(Checklist::class);
    }
    /**
     * ACTIVITY OBJECT
     */
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
    /**
     * ATTACHMENT OBJECT
     */
    public function attachment()
    {
        return $this->hasMany(Attachment::class);
    }
    /**
     * COMMENT OBJECT
     */
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    /**
     * CARD LABEL OBJECT
     */
    public function card_label()
    {
        return $this->hasMany(CardLabel::class);
    }
}
