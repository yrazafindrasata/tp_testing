<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @Assert\NotBlank
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @Assert\NotBlank
     * @Assert\NotNull()
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.")
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @Assert\Type(type={"digit"})
     * @Assert\Length(
     *      min = 10,
     *      minMessage = "Your phone number must be at least {{ limit }} characters long"
     * )
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $phone_number;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(?string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function validPhoneNumber(): bool
    {

        if (!empty($this->phone_number) && (substr($this->phone_number, 0, 1) !== '0')) {
            return false;
        }
        return true;
    }

}
