<?php

namespace Prepel\SimpleFlashMessage\Domain;


use Webmozart\Assert\Assert;

class SimpleFlashMessage
{
    private string $name;
    private ?array  $message;

    public function __construct(string $name, ?array $content = null)
    {
        $this->name = $name;
        $this->message = $content;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMessage(): ?array
    {
        return $this->message;
    }

    public function setMessage(array $message): void
    {
        $this->message = $message;
    }

    public function getTextMessage(): string
    {
        Assert::keyExists($this->message, 'text');

        return $this->message['text'];
    }

    public function setTextMessage(string $message): void
    {
        $this->message = [
            'text' => $message,
        ];
    }
}
