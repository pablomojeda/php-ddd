<?php

namespace App\Domain\User\ValueObject;

class Email
{
    private $email;

    public function __construct($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email format");
        }
        $this->email = $email;
    }

    public function value() { return $this->email; }
}
