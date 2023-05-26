<?php

namespace Sitemind\LLM\OpenAI;

use Sitemind\LLM\Entities\ChatMessage;
use Sitemind\LLM\Entities\ChatResponse;

/**
 * Class ChatResponse
 *
 * Represents a chat response returned by OpenAI.
 *
 * @package Sitemind\LLM\OpenAI
 */
class OpenAIChatResponse extends ChatResponse
{
    /**
     * Get the message related to the chat response.
     *
     * @return ChatMessage|null The message related to the chat response.
     */
    public function getMessage() : ?ChatMessage
    {
        $message = $this->data['choices'][0]['message'] ?? null;

        if ($message) {
            return ChatMessage::fromArray($message);
        }

        return null;
    }
}