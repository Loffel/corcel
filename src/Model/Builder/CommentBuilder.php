<?php

namespace Loffel\Model\Builder;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class CommentBuilder
 *
 * @package Loffel\Model\Builder
 * @author Junior Grossi <juniorgro@gmail.com>
 */
class CommentBuilder extends Builder
{
    /**
     * @return CommentBuilder
     */
    public function approved()
    {
        return $this->where('comment_approved', 1);
    }
}
