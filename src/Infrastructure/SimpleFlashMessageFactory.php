<?php

namespace Prepel\SimpleFlashMessage\Infrastructure;

use Prepel\SimpleFlashMessage\Application\SimpleFlashMessageService;

class SimpleFlashMessageFactory
{
    public function newSimpleFlashMessageService(): SimpleFlashMessageService
    {
        // TODO remove debug
        $session = $_SESSION ?? [];

        return new SimpleFlashMessageService(
            new SimpleFlashMessageStorage($session)
        );
    }
}
