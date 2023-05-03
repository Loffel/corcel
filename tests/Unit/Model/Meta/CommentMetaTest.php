<?php

namespace Loffel\Tests\Unit\Model\Meta;

use Loffel\Model\Comment;
use Loffel\Model\Meta\CommentMeta;

/**
 * Class CommentMetaTest
 *
 * @author Junior Grossi <juniorgro@gmail.com>
 */
class CommentMetaTest extends \Loffel\Tests\TestCase
{
    public function test_comment_relation()
    {
        $comment = factory(Comment::class)->create();
        $comment_meta = factory(CommentMeta::class)->create(['comment_id' => $comment->comment_ID]);

        $this->assertInstanceOf(Comment::class, $comment_meta->comment);
    }
}
