<?php
declare(strict_types=1);

namespace App\Service\User\Command;

class CreateUserCommand
{
    /**
     * @var string
     */
    private $name;

    /** @var string */
    private $email;

    /** @var string */
    private $password;

    public function __construct(
        string $name,
        string $email,
        string $password
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}