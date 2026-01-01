<?php

declare(strict_types=1);

namespace byteforge88\chatfilter;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class EventListener implements Listener {

    public function onChat(PlayerChatEvent $event) : void{
        $filter = Filter::getInstance();
        $message = $event->getMessage();

        if ($filter->checkCondition($message) === true) {
            $event->setMessage($filter->filter($message));
        } else {
            $event->setMessage($message);
        }
    }
}