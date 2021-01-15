<?php

namespace Prepel\SimpleFlashMessage\Infrastructure;

use Prepel\SimpleFlashMessage\Domain\SimpleFlashMessage;
use Prepel\SimpleFlashMessage\Domain\SimpleFlashMessageCollection;

class SimpleFlashMessageStorage
{
    private const SESSION_NAME = 'SimpleFlashMessage';

    private array $session;

    public function __construct(array &$session)
    {
        $this->session = &$session;
    }

    public function addMessage(SimpleFlashMessage $simpleFlashMessage): void
    {
        $this->session[self::SESSION_NAME][$simpleFlashMessage->getName()] = $simpleFlashMessage->getMessage();
    }

    public function hasMessage(string $name): ?SimpleFlashMessage
    {
        if(isset($this->session[self::SESSION_NAME][$name])){
            $message = $this->session[self::SESSION_NAME][$name];

            return new SimpleFlashMessage($name, $message);
        }

        return null;
    }

    public function getMessage(string $name): ?SimpleFlashMessage
    {
        $simpleFlashMessage = $this->hasMessage($name);
        
        if($simpleFlashMessage instanceof SimpleFlashMessage){
            unset($this->session[self::SESSION_NAME][$name]);
        }
        
        return $simpleFlashMessage;
    }

    public function getMessages(): SimpleFlashMessageCollection
    {
        $simpleFlashMessageCollection = new SimpleFlashMessageCollection();

        $messages = $this->session[self::SESSION_NAME];
        foreach($messages as $name => $message){
            $simpleFlashMessageCollection->add(new SimpleFlashMessage($name, $message));
            unset($this->session[self::SESSION_NAME][$name]);
        }

        return $simpleFlashMessageCollection;
    }
}
