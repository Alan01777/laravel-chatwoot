<?php

namespace Alan01777\LaravelChatwoot\Contracts;

use Alan01777\LaravelChatwoot\DTOs\AgentDTO;
use Alan01777\LaravelChatwoot\DTOs\ContactDTO;
use Alan01777\LaravelChatwoot\DTOs\MessageDTO;
use Alan01777\LaravelChatwoot\DTOs\TeamDTO;

interface ChatwootClientInterface
{
    /**
     * Get a list of contacts from the account.
     */
    public function getContacts(array $params = []): array;

    /**
     * Get detailed information about a specific contact.
     */
    public function getContact(int $id): array;

    /**
     * Create a new contact.
     */
    public function createContact(ContactDTO $data): array;

    /**
     * Update an existing contact.
     */
    public function updateContact(int $id, ContactDTO $data): array;

    /**
     * Delete a contact.
     */
    public function deleteContact(int $id): array;

    /**
     * Search for contacts by name, email, or phone number.
     */
    public function searchContacts(string $query): array;

    /**
     * Get a list of conversations for the account.
     */
    public function getConversations(array $params = []): array;

    /**
     * Get detailed information about a specific conversation.
     */
    public function getConversation(int $id): array;

    /**
     * Create a new conversation.
     */
    public function createConversation(int $sourceId, int $inboxId, int $contactId, array $additionalAttributes = []): array;

    /**
     * Update an existing conversation (status, assigned agents, etc).
     */
    public function updateConversation(int $id, array $data): array;

    /**
     * Toggle the priority of a conversation.
     */
    public function toggleConversationPriority(int $id): array;

    /**
     * Get meta information about conversations.
     */
    public function getConversationMeta(): array;

    /**
     * Get all messages for a specific conversation.
     */
    public function getMessages(int $conversationId): array;

    /**
     * Get a list of all inboxes in the account.
     */
    public function getInboxes(array $params = []): array;

    /**
     * Get detailed information about a specific inbox.
     */
    public function getInbox(int $id): array;

    /**
     * Get a list of agents that can be assigned to a specific inbox.
     */
    public function getInboxAgents(int $id): array;

    /**
     * Get WhatsApp message templates for a specific inbox.
     */
    public function getInboxTemplates(int $id): array;

    /**
     * Get a list of all agents associated with the account.
     */
    public function getAgents(): array;

    /**
     * Create a new agent.
     */
    public function addAgent(AgentDTO $data): array;

    /**
     * Update an existing agent.
     */
    public function updateAgent(int $id, AgentDTO $data): array;

    /**
     * Delete an agent.
     */
    public function removeAgent(int $id): array;

    /**
     * Get a list of all teams in the account.
     */
    public function getTeams(): array;

    /**
     * Create a new team.
     */
    public function createTeam(TeamDTO $data): array;

    /**
     * Delete a team.
     */
    public function deleteTeam(int $id): array;

    /**
     * Get a list of members for a specific team.
     */
    public function getTeamMembers(int $teamId): array;

    /**
     * Add a member to a team.
     */
    public function addTeamMember(int $teamId, int $userId): array;

    /**
     * Remove a member from a team.
     */
    public function removeTeamMember(int $teamId, int $userId): array;

    /**
     * Get a list of all labels defined in the account.
     */
    public function getLabels(): array;

    /**
     * Send a new message to an existing conversation.
     */
    public function sendMessage(int $conversationId, MessageDTO $message): array;

    /**
     * Send a file/attachment to an existing conversation.
     */
    public function sendFile(int $conversationId, mixed $file, ?string $content = null, array $additionalData = []): array;

    /**
     * Get all labels for a specific conversation.
     */
    public function getConversationLabels(int $conversationId): array;

    /**
     * Set labels for a specific conversation (overwrites existing).
     */
    public function setConversationLabels(int $conversationId, array $labels): array;

    /**
     * Update custom attributes for a specific conversation.
     */
    public function updateConversationCustomAttributes(int $conversationId, array $customAttributes): array;

    /**
     * Get all labels for a specific contact.
     */
    public function getContactLabels(int $contactId): array;

    /**
     * Set labels for a specific contact (overwrites existing).
     */
    public function setContactLabels(int $contactId, array $labels): array;

    /**
     * Get account reporting summary.
     */
    public function getAccountSummary(array $params = []): array;

    /**
     * Get agent reporting summary.
     */
    public function getAgentSummary(int $agentId, array $params = []): array;

    /**
     * Get inbox reporting summary.
     */
    public function getInboxSummary(int $inboxId, array $params = []): array;

    /**
     * Get reporting metrics (series data).
     */
    public function getMetrics(string $metric, array $params = []): array;

    /**
     * Get conversation statistics (real-time).
     */
    public function getConversationStats(array $params = []): array;

    /**
     * Get summary reports grouped by channel, inbox, agent, or team.
     */
    public function getSummaryReport(string $type, array $params = []): array;
}
