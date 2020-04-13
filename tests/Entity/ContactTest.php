<?php


namespace App\Tests\Entity;


use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    public function testValidPhoneNumber(){
        $contact = new Contact();
        $contact -> setPhoneNumber("0778956347");
        $this -> assertTrue($contact->validPhoneNumber());
    }

    public function testInvalidPhoneNumber(){
        $contact = new Contact();
        $contact -> setPhoneNumber("778956347");
        $this -> assertFalse($contact->validPhoneNumber());
    }
}