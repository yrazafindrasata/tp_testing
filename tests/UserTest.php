<?php
namespace Test;

use App\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIsValid()
    {
        $user = new User('toto@email.com', 'toto', 'foo', 14);
        $this->assertTrue($user->isValid());

        $user = new User('totomail', 'toto', 'foo', 15);
        $this->assertFalse($user->isValid());

        $user = new User('toto@email.com', '', 'foo', 15);
        $this->assertFalse($user->isValid());

        $user = new User('toto@email.com', 'toto', '', 15);
        $this->assertFalse($user->isValid());

        $user = new User('toto@email.com', 'toto', 'foo', 9);
        $this->assertFalse($user->isValid());
    }
}