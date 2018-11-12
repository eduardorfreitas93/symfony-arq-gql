<?php

namespace App\Repository;

use App\Entity\Role;

class RoleRepository extends AbstractRepository
{
    public function getEntityClassName(): string
    {
        return Role::class;
    }
}
