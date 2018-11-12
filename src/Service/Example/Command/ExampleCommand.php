<?php
declare(strict_types=1);

namespace App\Service\Example\Command;

class ExampleCommand
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $nuId;

    public function __construct(
        string $name,
        int $nuId
    ) {
        $this->name = $name;
        $this->nuId = $nuId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getNuId(): int
    {
        return $this->nuId;
    }
}