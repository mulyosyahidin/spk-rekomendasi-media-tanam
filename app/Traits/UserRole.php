<?php

namespace App\Traits;

trait UserRole
{
    /**
     * Determine if the user has the specified role.
     *
     * This method compares the user's role with the provided role string.
     *
     * @param string $role The role to check against the user's role.
     * @return bool True if the user has the specified role, false otherwise.
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }
}
