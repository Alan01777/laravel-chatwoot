<?php

namespace Alan01777\LaravelChatwoot\DTOs;

class MessageDTO
{
    /**
     * @param string $content The text content of the message.
     * @param string $messageType The type of message (incoming, outgoing).
     * @param bool $private Whether the message is private (an internal note).
     * @param array $attachments Optional array of attachments.
     * @param array|null $templateParams Optional WhatsApp template parameters.
     */
    public function __construct(
        public readonly string $content,
        public readonly string $messageType = 'outgoing',
        public readonly bool $private = false,
        public readonly array $attachments = [],
        public readonly ?array $templateParams = null
    ) {}

    public function toArray(): array
    {
        $data = [
            'content' => $this->content,
            'message_type' => $this->messageType,
            'private' => $this->private,
            'attachments' => $this->attachments,
        ];

        if (!is_null($this->templateParams)) {
            $templateParams = $this->templateParams;
            
            // Ensure processed_params is present
            if (!isset($templateParams['processed_params']) || is_null($templateParams['processed_params'])) {
                $templateParams['processed_params'] = [];
            }

            // Force it to be an object (hash) in JSON if it's an array
            if (is_array($templateParams['processed_params'])) {
                $templateParams['processed_params'] = (object) $templateParams['processed_params'];
            }

            $data['template_params'] = $templateParams;
        }

        return array_filter($data, fn($value) => !is_null($value));
    }
}


