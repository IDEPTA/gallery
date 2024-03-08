<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GithubPolicy
{
    /**
     * Create a new policy instance.
     */
    public function view(User $model)
    {
        return $model->github_id;
    }
}
