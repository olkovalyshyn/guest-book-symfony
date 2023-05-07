<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
//    #[ORM\Id]
//    #[ORM\GeneratedValue]
//    #[ORM\Column]
    private ?int $id = null;

//    /**
//     * @ORM\ManyToOne(inversedBy="messages")
//     * @ORM\JoinColumn(nullable=false)
//     */
////    #[ORM\ManyToOne(inversedBy: 'messages')]
////    #[ORM\JoinColumn(nullable: false)]
//    private ?User $user_id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
//    #[ORM\Column(length: 255)]
    private ?string $username = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
//    #[ORM\Column(length: 255)]
    private ?string $email = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
//    #[ORM\Column(length: 255, nullable: true)]
    private ?string $homepage = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
//    #[ORM\Column(length: 255)]
    private ?string $captcha = null;

    /**
     * @ORM\Column(type="text")
     */
//    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
//    #[ORM\Column(length: 255, nullable: true)]
    private ?string $language = null;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     */
//    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $image = null;

    /**
     * @ORM\Column(type="datetime", options={"default"="CURRENT_TIMESTAMP"}, nullable=true)
     */
//    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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

    public function getHomepage(): ?string
    {
        return $this->homepage;
    }

    public function setHomepage(?string $homepage): self
    {
        $this->homepage = $homepage;

        return $this;
    }

    public function getCaptcha(): ?string
    {
        return $this->captcha;
    }

    public function setCaptcha(string $captcha): self
    {
        $this->captcha = $captcha;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

//    public function getUserId(): ?User
//    {
//        return $this->user_id;
//    }
//
//    public function setUserId(?User $user_id): self
//    {
//        $this->user_id = $user_id;
//
//        return $this;
//    }
}



