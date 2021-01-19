<?php

namespace Prepel\Tests\Domain;

use Generator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Prepel\SimpleFlashMessage\Domain\SimpleFlashMessage;

class SimpleFlashMessageTest extends TestCase
{
    /**
     * @dataProvider instantiateValuesProvider
     */
    public function testItCanBeInstantiated(string $name, ?array $content): void
    {
        $simpleFlashMessage = new SimpleFlashMessage($name, $content);

        $this->assertSame($name, $simpleFlashMessage->getName());
        $this->assertSame($content, $simpleFlashMessage->getMessage());
    }

    public function instantiateValuesProvider(): Generator
    {
        yield 'normal use' => [
            'Name',
            ['foo' => 'bar']
        ];

        yield 'without content' => [
            'Name',
            null
        ];
    }

    public function testItIsPossibleToAddAMessage(): void
    {
        $simpleFlashMessage = new SimpleFlashMessage('Test');

        $expectedMessage = [
            'foo' => 'bar'
        ];

        $simpleFlashMessage->setMessage($expectedMessage);
        $this->assertSame($expectedMessage, $simpleFlashMessage->getMessage());
    }

    public function testItIsPossibleToAddATextMessage(): void
    {
        $simpleFlashMessage = new SimpleFlashMessage('Test');

        $expectedTestMessage = 'This is a test message';
        $simpleFlashMessage->setTextMessage($expectedTestMessage);

        $this->assertSame($expectedTestMessage, $simpleFlashMessage->getTextMessage());
    }

    public function testItWillFailWhenTryingToGetTextMessageWithoutText(): void
    {
        $simpleFlashMessage = new SimpleFlashMessage('Test');
        $simpleFlashMessage->setMessage(['foo' => 'bar']);

        $this->expectException(InvalidArgumentException::class);

        $simpleFlashMessage->getTextMessage();
    }
}
