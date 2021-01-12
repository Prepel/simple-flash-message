<?php

namespace Prepel\SimpleFlashMessage\Domain;


class SimpleFlashMessage
{
    private string $name;
    private array  $message;

    public function __construct(string $name, ?array $content = null)
    {
        $this->name = $name;

        if ($content !== null) {
            $this->message = $content;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMessage(): array
    {
        return $this->message;
    }

    public function setMessage(array $message): void
    {
        $this->message = $message;
    }

    public function getTextMessage(): string
    {
        // TODO assert has key text
        return $this->message['text'];
    }

    public function setTextMessage(string $message): void
    {
        $this->message = [
            'text' => $message,
        ];
    }
}
