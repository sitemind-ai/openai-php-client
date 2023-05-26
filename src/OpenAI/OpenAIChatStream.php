<?php

namespace Sitemind\LLM\OpenAI;

use Sitemind\LLM\Entities\ChatMessage;
use Sitemind\LLM\Entities\ChatStream;

/**
 * Class OpenAIChatStream
 *
 * Represents a chat response stream returned by OpenAI.
 *
 * @package Sitemind\LLM\OpenAI
 */
class OpenAIChatStream extends ChatStream
{
    /**
     * Get the message related to the chat response stream.
     *
     * @return ChatMessage|null The message related to the chat response stream.
     */
    public function getMessage() : ?ChatMessage
    {
        $choice = $this->data['choices'][0] ?? [];

        $message = $choice['message'] ?? $choice['delta'] ?? null;

        if ($message) {
            return ChatMessage::fromArray($message);
        }

        return null;
    }
}
