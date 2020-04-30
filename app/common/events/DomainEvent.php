<?php

namespace Fiverr\Events;

interface DomainEvent
{
    /**
    * @return DateTimeImmutable
    */
    public function occurredOn();
}

?>