<?php

namespace Alan01777\LaravelChatwoot\Testing;

use Alan01777\LaravelChatwoot\Contracts\ChatwootClientInterface;
use Alan01777\LaravelChatwoot\DTOs\AgentDTO;
use Alan01777\LaravelChatwoot\DTOs\ContactDTO;
use Alan01777\LaravelChatwoot\DTOs\ConversationDTO;
use Alan01777\LaravelChatwoot\DTOs\MessageDTO;
use Alan01777\LaravelChatwoot\DTOs\ReportCriteriaDTO;
use Alan01777\LaravelChatwoot\DTOs\TeamDTO;
use PHPUnit\Framework\Assert;

class ChatwootFake implements ChatwootClientInterface
{
    protected array $calls = [];

    protected function recordCall(string $method, array $args = []): void
    {
        $this->calls[$method][] = $args;
    }

    public function getContacts(array $params = []): array
    {
        $this->recordCall('getContacts', [$params]);
        return [];
    }

    public function getContact(int $id): array
    {
        $this->recordCall('getContact', [$id]);
        return [];
    }

    public function createContact(ContactDTO $data): array
    {
        $this->recordCall('createContact', [$data]);
        return [];
    }

    public function updateContact(int $id, ContactDTO $data): array
    {
        $this->recordCall('updateContact', [$id, $data]);
        return [];
    }

    public function deleteContact(int $id): array
    {
        $this->recordCall('deleteContact', [$id]);
        return [];
    }

    public function searchContacts(string $query): array
    {
        $this->recordCall('searchContacts', [$query]);
        return [];
    }

    public function getConversations(array $params = []): array
    {
        $this->recordCall('getConversations', [$params]);
        return [];
    }

    public function getConversation(int $id): array
    {
        $this->recordCall('getConversation', [$id]);
        return [];
    }

    public function createConversation(ConversationDTO $data): array
    {
        $this->recordCall('createConversation', [$data]);
        return [];
    }

    public function updateConversation(int $id, ConversationDTO $data): array
    {
        $this->recordCall('updateConversation', [$id, $data]);
        return [];
    }

    public function toggleConversationPriority(int $id): array
    {
        $this->recordCall('toggleConversationPriority', [$id]);
        return [];
    }

    public function getConversationMeta(): array
    {
        $this->recordCall('getConversationMeta');
        return [];
    }

    public function getMessages(int $conversationId): array
    {
        $this->recordCall('getMessages', [$conversationId]);
        return [];
    }

    public function getInboxes(array $params = []): array
    {
        $this->recordCall('getInboxes', [$params]);
        return [];
    }

    public function getInbox(int $id): array
    {
        $this->recordCall('getInbox', [$id]);
        return [];
    }

    public function getInboxAgents(int $id): array
    {
        $this->recordCall('getInboxAgents', [$id]);
        return [];
    }

    public function getInboxTemplates(int $id): array
    {
        $this->recordCall('getInboxTemplates', [$id]);
        return [];
    }

    public function getAgents(): array
    {
        $this->recordCall('getAgents');
        return [];
    }

    public function addAgent(AgentDTO $data): array
    {
        $this->recordCall('addAgent', [$data]);
        return [];
    }

    public function updateAgent(int $id, AgentDTO $data): array
    {
        $this->recordCall('updateAgent', [$id, $data]);
        return [];
    }

    public function removeAgent(int $id): array
    {
        $this->recordCall('removeAgent', [$id]);
        return [];
    }

    public function getTeams(): array
    {
        $this->recordCall('getTeams');
        return [];
    }

    public function createTeam(TeamDTO $data): array
    {
        $this->recordCall('createTeam', [$data]);
        return [];
    }

    public function deleteTeam(int $id): array
    {
        $this->recordCall('deleteTeam', [$id]);
        return [];
    }

    public function getTeamMembers(int $teamId): array
    {
        $this->recordCall('getTeamMembers', [$teamId]);
        return [];
    }

    public function addTeamMember(int $teamId, int $userId): array
    {
        $this->recordCall('addTeamMember', [$teamId, $userId]);
        return [];
    }

    public function removeTeamMember(int $teamId, int $userId): array
    {
        $this->recordCall('removeTeamMember', [$teamId, $userId]);
        return [];
    }

    public function getLabels(): array
    {
        $this->recordCall('getLabels');
        return [];
    }

    public function sendMessage(int $conversationId, MessageDTO $message): array
    {
        $this->recordCall('sendMessage', [$conversationId, $message]);
        return [];
    }

    public function sendFile(int $conversationId, mixed $file, ?string $content = null, array $additionalData = []): array
    {
        $this->recordCall('sendFile', [$conversationId, $file, $content, $additionalData]);
        return [];
    }

    public function getConversationLabels(int $conversationId): array
    {
        $this->recordCall('getConversationLabels', [$conversationId]);
        return [];
    }

    public function setConversationLabels(int $conversationId, array $labels): array
    {
        $this->recordCall('setConversationLabels', [$conversationId, $labels]);
        return [];
    }

    public function updateConversationCustomAttributes(int $conversationId, array $customAttributes): array
    {
        $this->recordCall('updateConversationCustomAttributes', [$conversationId, $customAttributes]);
        return [];
    }

    public function getContactLabels(int $contactId): array
    {
        $this->recordCall('getContactLabels', [$contactId]);
        return [];
    }

    public function setContactLabels(int $contactId, array $labels): array
    {
        $this->recordCall('setContactLabels', [$contactId, $labels]);
        return [];
    }

    public function getAccountSummary(?ReportCriteriaDTO $params = null): array
    {
        $this->recordCall('getAccountSummary', [$params]);
        return [];
    }

    public function getAgentSummary(int $agentId, ?ReportCriteriaDTO $params = null): array
    {
        $this->recordCall('getAgentSummary', [$agentId, $params]);
        return [];
    }

    public function getInboxSummary(int $inboxId, ?ReportCriteriaDTO $params = null): array
    {
        $this->recordCall('getInboxSummary', [$inboxId, $params]);
        return [];
    }

    public function getMetrics(string $metric, ?ReportCriteriaDTO $params = null): array
    {
        $this->recordCall('getMetrics', [$metric, $params]);
        return [];
    }

    public function getConversationStats(?ReportCriteriaDTO $params = null): array
    {
        $this->recordCall('getConversationStats', [$params]);
        return [];
    }

    public function getSummaryReport(string $type, ?ReportCriteriaDTO $params = null): array
    {
        $this->recordCall('getSummaryReport', [$type, $params]);
        return [];
    }

    // Assertion Helpers

    public function assertMessageSent(callable $callback): void
    {
        $calls = $this->calls['sendMessage'] ?? [];
        
        foreach ($calls as $args) {
            if ($callback($args[1], $args[0])) {
                return;
            }
        }

        Assert::fail('The expected message was not sent.');
    }

    public function assertContactCreated(callable $callback): void
    {
        $calls = $this->calls['createContact'] ?? [];

        foreach ($calls as $args) {
            if ($callback($args[0])) {
                return;
            }
        }

        Assert::fail('The expected contact was not created.');
    }

    public function assertFileSent(callable $callback): void
    {
        $calls = $this->calls['sendFile'] ?? [];

        foreach ($calls as $args) {
            if ($callback($args[1], $args[0], $args[2])) {
                return;
            }
        }

        Assert::fail('The expected file was not sent.');
    }

    public function assertConversationUpdated(callable $callback): void
    {
        $calls = $this->calls['updateConversation'] ?? [];

        foreach ($calls as $args) {
            if ($callback($args[1], $args[0])) {
                return;
            }
        }

        Assert::fail('The expected conversation was not updated.');
    }
}
