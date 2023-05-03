<?php

namespace Loffel\Tests\Unit\Model\Meta;

use Loffel\Model\Meta\PostMeta;
use Loffel\Model\Meta\TermMeta;
use Loffel\Model\Post;
use Loffel\Model\Term;

/**
 * Class TermMetaTest
 *
 * @author Junior Grossi <juniorgro@gmail.com>
 */
class TermMetaTest extends \Loffel\Tests\TestCase
{
    public function test_term_relation()
    {
        $term_meta = factory(TermMeta::class)->create();

        $this->assertInstanceOf(Term::class, $term_meta->term);
    }
}
