<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function edit(User $user = null, Job $job): bool
    {
        if ($user === null || $job->user === null)
            return false;

        return $job->user->is($user);
    }
    public function update(User $user = null, Job $job): bool
    {
        if ($user === null || $job->user === null)
            return false;

        return $job->user->is($user);
    }

    public function destroy(User $user = null, Job $job): bool
    {
        if ($user === null || $job->user === null)
            return false;

        return $job->user->is($user);
    }

}
