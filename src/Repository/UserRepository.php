<?php

namespace App\Repository;

use App\Entity\User;

class UserRepository extends AbstractRepository
{
    public function getEntityClassName(): string
    {
        return User::class;
    }
}
