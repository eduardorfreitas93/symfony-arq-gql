<?php

namespace App\Event;

use Symfony\Component\EventDispatcher\Event;

class EventRecorder
{
    /**
     * @var Event[]|array
     */
    private $recordedEvents = [];

    public function releaseEvents()
    {
        $events = $this->recordedEvents;
        $this->eraseEvents();
        return $events;
    }

    public function eraseEvents()
    {
        $this->recordedEvents = [];
    }

    public function record(AbstractEvent $event)
    {
        $this->recordedEvents[] = $event;
    }
}
