<?php
session_start();

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

// Peek message (won't remove it from sessiong)
$simpleFlashMessage = $service->hasMessage('test');

// get message (will remove it from session)
$simpleFlashMessage = $service->getMessage('test');
$simpleFlashMessage->getTextMessage();

// Get all messages (will remove all of them from session)
$messages = $service->getMessages();


