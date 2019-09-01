<?php

namespace App\Repositories\Interfaces;

use App\User;

interface BlogRepositoryInterface
{
    public function all();

    public function getByUser(User $user);
}