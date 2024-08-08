<?php

namespace App\Domain\User\ValueObject;

class Password
{
    private $password;

    public function __construct($password)
    {
        if (strlen($password) < 8) {
            throw new \InvalidArgumentException("Password must be at least 8 characters long");
        }
        $this->password = $password;
    }

    public function getPassword() { return $this->password; }
}
