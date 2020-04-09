<?php
namespace Test;

use App\User;
use phpDocumentor\Reflection\Types\Void_;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /** @var User $user */
    private $user;


    public function setUp(): void
    {
        $this -> user = new User('toto@email.com', 'toto', 'foo', 14);
    }

    public function tearDown(): void
    {
        unset($this->user);
    }

    public function testIsValid()
    {
        $user = new User('toto@email.com', 'toto', 'foo', 14);
        $this->assertTrue($this->user->isValid());
    }
    public function testBadEmail(){
        $this->user->setEmail('totomail');
        $this->assertFalse($this->user->isValid());

    }
    public function testBadAge(){
        $this->user->setAge(12);
        $this->assertFalse($this->user->isValid());
    }
    public function testBadFirstName(){
        $this->user->setFirstName('');
        $this->assertFalse($this->user->isValid());
    }
    public function testBadLastName(){
        $this->user->setLastname('');
        $this->assertFalse($this->user->isValid());
    }