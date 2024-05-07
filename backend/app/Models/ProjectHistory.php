<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectHistory extends Model
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
        'project_name',
        'year', 
        'platform',
        'role_guid',
        'description',
        'user_guid'
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
        'updated_at' => 'datetime'
        // 'status' => StatusEnum::class
    ];

    /**
     * User OBJECT
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_guid');
    }

    /**
     * ROLE OBJECT
     */
    public function projectHistoryMaster()
    {
        return $this->belongsTo(ProjectHistoryMaster::class, 'role_guid');
    }
}
