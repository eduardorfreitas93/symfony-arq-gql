<?php
declare(strict_types=1);

namespace App\Service\Example\Handler;

use App\Service\Example\Command\ExampleCommand;
use App\Service\HandlerInterface;

class ExampleHandler implements HandlerInterface
{
    public function __construct()
    {
    }

    public function handle(ExampleCommand $command): void
    {
        echo '<pre>'; \Doctrine\Common\Util\Debug::dump($command->getNuId());die();
    }
}
