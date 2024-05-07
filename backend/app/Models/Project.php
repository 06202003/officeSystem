<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
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
        'description',
        'start_date',
        'end_date',
        'status',
        'project_category_guid',
        'project_manager_guid'
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
     * COMPANY PROJECT OBJECT
     */
    public function company_project()
    {
        return $this->belongsTo(CompanyProject::class);
    }
    /**
     * BOARD OBJECT
     */
    public function board()
    {
        return $this->hasMany(Board::class);
    }
    /**
     * USER PROJECT OBJECT
     */
    public function user_project()
    {
        return $this->hasMany(UserProject::class);
    }
    /**
     * PROJECT CATEGORY OBJECT
     */
    public function project_category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }
    /**
     * PROJECT MANAGER OBJECT
     */
    public function project_manager()
    {
        return $this->belongsTo(User::class, 'project_manager_guid', 'guid');
    }
}
