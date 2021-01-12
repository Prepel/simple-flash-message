<?php

namespace Prepel\SimpleFlashMessage\Application;

use Prepel\SimpleFlashMessage\Domain\SimpleFlashMessage;
use Prepel\SimpleFlashMessage\Domain\SimpleFlashMessageCollection;
use Prepel\SimpleFlashMessage\Infrastructure\SimpleFlashMessageStorage;

class SimpleFlashMessageService
{
    private SimpleFlashMessageStorage $storage;

    public function __construct(SimpleFlashMessageStorage $storage)
    {
        $this->storage = $storage;
    }

    public function addMessage(SimpleFlashMessage $simpleFlashMessage): void
    {
        $this->storage->addMessageToSession($simpleFlashMessage);
    }

    public function hasMessage(string $name): SimpleFlashMessage
    {
    }

    public function getMessage(string $name): SimpleFlashMessage
    {
    }

    public function getMessages(): SimpleFlashMessageCollection
    {
    }
}
