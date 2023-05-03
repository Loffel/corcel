<?php

namespace Loffel\Tests\Unit\Model\Meta;

use Loffel\Model\Meta\UserMeta;
use Loffel\Model\User;

/**
 * Class UserMetaTest
 *
 * @author Junior Grossi <juniorgro@gmail.com>
 */
class UserMetaTest extends \Loffel\Tests\TestCase
{
    public function test_user_relation()
    {
        $user_meta = factory(UserMeta::class)->create();

        $this->assertInstanceOf(User::class, $user_meta->user);
    }
}
