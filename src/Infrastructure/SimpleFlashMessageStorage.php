<?php

namespace Prepel\SimpleFlashMessage\Infrastructure;

use Prepel\SimpleFlashMessage\Domain\SimpleFlashMessage;

class SimpleFlashMessageStorage
{
    private const SESSION_NAME = 'SimpleFlashMessage';

    private array $session;

    public function __construct(array &$session)
    {
        $this->session = &$session;
    }

    public function addMessageToSession(SimpleFlashMessage $simpleFlashMessage): void
    {
        var_dump('adding SFM', $simpleFlashMessage);
    }

    public function getMessageFromSession(string $name): SimpleFlashMessage
    {
    }
}
