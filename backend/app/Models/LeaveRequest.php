<?php

namespace App\Models;

use App\Observers\LeaveRequestObserver;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory, Uuid;

    protected $primaryKey = 'guid';
    protected $keyType = 'string';

    protected $fillable = [
        'user_requested_guid',
        'start_date', 
        'end_date', 
        'leave_type_guid', 
        'date_requested', 
        'date_actioned', 
        'description',
        'status',
        'reason',
        'approved_by_guid',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function leaveTypes()
    {
        return $this->hasMany(LeaveType::class);
    }

    public function leaveRequestUser()
    {
        return $this->hasMany(User::class);
    }

}


