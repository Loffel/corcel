<?php

namespace Loffel\Tests\Unit\Model\Contracts;

use Loffel\Model\User;
use Loffel\Tests\TestCase;
use Illuminate\Contracts\Auth\CanResetPassword;

/**
 * Class CanResetPasswordTest
 *
 * @package Loffel\Tests\Unit\Model\Contracts
 * @author Junior Grossi <juniorgro@gmail.com>
 */
class CanResetPasswordTest extends TestCase
{
    public function test_get_email_for_password_reset()
    {
        /** @var CanResetPassword $user */
        $user = factory(User::class)->create();
        $this->assertEquals($user->user_email, $user->getEmailForPasswordReset());
    }

    public function test_send_password_reset_notification()
    {
        /** @var CanResetPassword $user */
        $user = factory(User::class)->create();
        $this->assertEmpty($user->sendPasswordResetNotification('foo'));
    }
}
