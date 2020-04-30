<?php

namespace Fiverr\Events;

interface DomainEventSubscriber
{
    /**
     * @param DomainEvent $aDomainEvent
     */
    public function handle($aDomainEvent);

    /**
     * @param DomainEvent $aDomainEvent
     * @return bool
     */
    public function isSubscribedTo($aDomainEvent);
}

?>