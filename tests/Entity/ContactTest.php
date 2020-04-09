<?php


namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Contact;
use Symfony\Bridge\PhpUnit\SetUpTearDownTrait;


class ContactTest extends TestCase
{
    private $contact;

    public function setUp(): void
    {
        $this -> contact = new Contact();
        $this -> contact -> setFirstname('toto');
        $this -> contact -> setLastname('foo');
        $this -> contact -> setEmail('toto@mail.com');
        $this -> contact -> setPhoneNumber('0617723470');
    }

    public function tearDown(): void
    {
        unset($this->contact);
    }

    public function testIsValid()
    {
        $this->assertTrue($this->contact->isValid());
    }

    public function testEmptyFirstname()
    {
        $this -> contact -> setFirstname('');
        $this->assertFalse($this->contact->isValid());
    }

    public function testEmptyLastname()
    {
        $this -> contact -> setLastname('');
        $this->assertFalse($this->contact->isValid());
    }

    public function testEmptyEmail()
    {
        $this -> contact -> setEmail('');
        $this->assertFalse($this->contact->isValid());
    }

    public function testBadEmail()
    {
        $this -> contact -> setEmail('totommail');
        $this->assertFalse($this->contact->isValid());
    }

    public function testBadPhoneNumberLen()
    {
        $this -> contact -> setPhoneNumber('061772347');
        $this->assertFalse($this->contact->isValid());
    }

    public function testBadPhoneNumberLetter()
    {
        $this -> contact -> setPhoneNumber('061772347a');
        $this->assertFalse($this->contact->isValid());
    }

}