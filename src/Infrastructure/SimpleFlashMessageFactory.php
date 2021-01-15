<?php

namespace Prepel\SimpleFlashMessage\Infrastructure;

use Prepel\SimpleFlashMessage\Application\SimpleFlashMessageService;

class SimpleFlashMessageFactory
{
    public function newSimpleFlashMessageService(): SimpleFlashMessageService
    {
        return new SimpleFlashMessageService(
            new SimpleFlashMessageStorage($_SESSION)
        );
    }
}
