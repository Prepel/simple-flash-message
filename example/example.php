<?php

require_once '../vendor/autoload.php';

$factory = new \Prepel\SimpleFlashMessage\Infrastructure\SimpleFlashMessageFactory();
$service = $factory->newSimpleFlashMessageService();

// service ready to use

// Simple Message with text only
$simpleFlashMessage = new \Prepel\SimpleFlashMessage\Domain\SimpleFlashMessage('test');
$simpleFlashMessage->setTextMessage('Hello world');

$service->addMessage($simpleFlashMessage);

// Simple flash message with some context
$simpleFlashMessageWithContext = new \Prepel\SimpleFlashMessage\Domain\SimpleFlashMessage('contextual');
$simpleFlashMessageWithContext->setMessage(
    [
        'context' => 'foo',
        'text'    => 'bar',
        'type'    => 'danger',
    ]
);

$service->addMessage($simpleFlashMessageWithContext);

// Shorthand contextual message
$service->addMessage(new \Prepel\SimpleFlashMessage\Domain\SimpleFlashMessage('shortContextual', ['foo' => 'bar', 'text' => 'short']));


// TODO example on how to get or peek them