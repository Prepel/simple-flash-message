<?php

namespace Prepel\SimpleFlashMessage\Infrastructure;

use Prepel\SimpleFlashMessage\Application\SimpleFlashMessageService;

class SimpleFlashMessageFactory
{
    public function newSimpleFlashMessageService(): SimpleFlashMessageService
    {
        // TODO assert SESSION
        var_dump('s', $_SESSION);

        return new SimpleFlashMessageService(
            new SimpleFlashMessageStorage($_SESSION)
        );
    }
}
