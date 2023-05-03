<?php

namespace Loffel\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasRoles
{
    use MetaFields;

    public function hasRole(string $role): bool
    {
        return in_array($role, $this->capabilities);
    }

    public function hasAnyRoles(array $roles): bool
    {
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }

        return false;
    }

    protected function capabilities(): Attribute
    {
        return Attribute::make(
            get: fn () => array_keys($this->getMeta('wp_capabilities'))
        );
    }

    protected function isAdmin(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->hasRole('administrator')
        );
    }
}