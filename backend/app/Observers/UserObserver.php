<?php

namespace App\Observers;

use App\Models\LeaveAllocation;
use App\Models\LeaveType;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $leaveTypes = LeaveType::get();

        foreach ($leaveTypes as $leaveType) {
            LeaveAllocation::create([
                'guid' => $user->guid,
                'uuid' => $user->uuid,
                'name' => $leaveType->name,
                'number_of_day' => 15,
                'description' => $leaveType->description,
                'user_guid' => $user->guid,
            ]);
        }
    }
}