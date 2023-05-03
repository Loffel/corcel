<?php

namespace Loffel\Concerns;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait OrderedTrait
 *
 * @package Loffel\Traits
 * @author Junior Grossi <juniorgro@gmail.com>
 */
trait OrderScopes
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeNewest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOldest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'asc');
    }
}
