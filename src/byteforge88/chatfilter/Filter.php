<?php

declare(strict_types=1);

namespace byteforge88\chatfilter;

use pocketmine\utils\SingletonTrait;

class Filter {
    use SingletonTrait;
    
    public function filter(string $message) : string{
        $filtered_words = Core::getInstance()->getWords();

        foreach ($filtered_words as $word) {
            $message = str_replace($word, str_repeat("*", strlen($word)), $message);
        }

        return $message;
    }

    public function checkCondition(string $message) : bool{
        $filtered_words = Core::getInstance()->getWords();
        
        foreach ($filtered_words as $word) {
            if (str_contains($message, $word)) {
                return true;
            }
        }

        return false;
    }
}
