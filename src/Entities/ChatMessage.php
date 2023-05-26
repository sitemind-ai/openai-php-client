<?php

namespace Sitemind\LLM\Entities;

/**
 * Class ChatMessage
 *
 * Represents a single message in a chat conversation
 *
 * @package Sitemind\LLM\Entities
 */
class ChatMessage
{
    /**
     * ChatMessage constructor.
     *
     * @param string|null $role The role of the message sender (e.g., "system", "user", "assistant")
     * @param string|null $content The content of the message
     * @param string|null $name The name of the user (optional)
     */
    public function __construct(
        public ?string $role, 
        public ?string $content, 
        public ?string $name = null)
    {
    }

    /**
     * Convert the message object to an array
     *
     * @return array An array representation of the message
     */
    public function toArray()
    {
        $data = [
            'role' => $this->role,
            'content' => $this->content
        ];

        if ($this->name) {
            $data['name'] = $this->name;
        }

        return $data;
    }

    /**
     * Convert an array to a message object
     *
     * @param array $message The array message to use for creating the message
     * @return ChatMessage
     */
    public static function fromArray(array $message) : ChatMessage
    {
        return new ChatMessage($message['role'] ?? null, $message['content'] ?? null, $message['name'] ?? null);
    }    

    /**
     * Convert an array list to a message objects
     *
     * @param array $history The list of array messages to use for creating the message
     * @return array
     */
    public static function fromHistoryArray(array $history) : array
    {
        $messages = [];

        foreach($history as $item) {
            $messages[] = new ChatMessage($item['role']?? null, $item['content'] ?? null, $item['name'] ?? null);
        }

        return $messages;
    }
}