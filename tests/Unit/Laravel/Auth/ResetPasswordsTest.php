<?php

namespace Loffel\Tests\Unit\Laravel\Auth;

use Loffel\Laravel\Auth\ResetsPasswords;
use Loffel\Model\User;
use Loffel\Services\PasswordService;
use Loffel\Tests\TestCase;
use Illuminate\Routing\Controller;

class ResetPasswordsTest extends TestCase
{
    public function test_it_resets_password()
    {
        $user = factory(User::class)->create();
        $fake_class = new FakeController();

        $method = new \ReflectionMethod($fake_class, 'resetPassword');
        $method->setAccessible(true);
        $method->invoke($fake_class, $user, 'bar');

        $this->assertTrue((new PasswordService())->check('bar', $user->user_pass));
    }
}

class FakeController extends Controller
{
    use ResetsPasswords;
}
