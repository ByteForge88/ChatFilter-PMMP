<?php

declare(strict_types=1);

namespace byteforge88\chatfilter;

use pocketmine\plugin\PluginBase;

class Core extends PluginBase {

    protected static self $instance;

    protected function onLoad() : void{
        self::$instance = $this;
    }

    protected function onEnable() : void{
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    }

    public static function getInstance() : self{
        return self::$instance;
    }

    public function getWords() : array{
        return $this->getConfig()->get("words", []);
    }
}