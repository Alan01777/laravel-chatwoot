<?php

namespace Alan01777\LaravelChatwoot\DTOs;

use Alan01777\LaravelChatwoot\Enums\ConversationPriority;
use Alan01777\LaravelChatwoot\Enums\ConversationStatus;

class ConversationDTO
{
    /**
     * @param int|null $sourceId Source ID (for creation)
     * @param int|null $inboxId Inbox ID (for creation)
     * @param int|null $contactId Contact ID (for creation)
     * @param ConversationStatus|null $status Status of the conversation
     * @param int|null $assigneeId ID of the assigned agent
     * @param int|null $teamId ID of the assigned team
     * @param array|null $labels List of labels
     * @param array|null $customAttributes Custom attributes
     * @param ConversationPriority|null $priority Priority of the conversation
     */
    public function __construct(
        public readonly ?int $sourceId = null,
        public readonly ?int $inboxId = null,
        public readonly ?int $contactId = null,
        public readonly ?ConversationStatus $status = null,
        public readonly ?int $assigneeId = null,
        public readonly ?int $teamId = null,
        public readonly ?array $labels = null,
        public readonly ?array $customAttributes = null,
        public readonly ?ConversationPriority $priority = null
    ) {}

    public function toArray(): array
    {
        return array_filter([
            'source_id' => $this->sourceId,
            'inbox_id' => $this->inboxId,
            'contact_id' => $this->contactId,
            'status' => $this->status?->value,
            'assignee_id' => $this->assigneeId,
            'team_id' => $this->teamId,
            'labels' => $this->labels,
            'custom_attributes' => $this->customAttributes,
            'priority' => $this->priority?->value,
        ], fn($value) => !is_null($value));
    }
}
