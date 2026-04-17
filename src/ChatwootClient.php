<?php

namespace Alan01777\LaravelChatwoot;

use Alan01777\LaravelChatwoot\Contracts\ChatwootClientInterface;
use Alan01777\LaravelChatwoot\DTOs\AgentDTO;
use Alan01777\LaravelChatwoot\DTOs\ContactDTO;
use Alan01777\LaravelChatwoot\DTOs\MessageDTO;
use Alan01777\LaravelChatwoot\DTOs\TeamDTO;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class ChatwootClient implements ChatwootClientInterface
{
    /**
     * Create a new Chatwoot client instance.
     */
    public function __construct(
        private string $baseUrl,
        private string $accountId,
        private string $apiAccessToken
    ) {}

    /**
     * Get the configured HTTP client with base URL and authorization.
     */
    private function client(): PendingRequest
    {
        return Http::withHeaders([
            'api_access_token' => $this->apiAccessToken,
            'Accept' => 'application/json',
        ])->baseUrl("{$this->baseUrl}/api/v1/accounts/{$this->accountId}/");
    }

    /**
     * {@inheritdoc}
     */
    public function getContacts(array $params = []): array
    {
        return $this->client()->get('contacts', $params)->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getContact(int $id): array
    {
        return $this->client()->get("contacts/{$id}")->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function createContact(ContactDTO $data): array
    {
        return $this->client()->post('contacts', $data->toArray())->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function updateContact(int $id, ContactDTO $data): array
    {
        return $this->client()->patch("contacts/{$id}", $data->toArray())->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function deleteContact(int $id): array
    {
        return $this->client()->delete("contacts/{$id}")->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function searchContacts(string $query): array
    {
        return $this->client()->get('contacts/search', ['q' => $query])->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getConversations(array $params = []): array
    {
        return $this->client()->get('conversations', $params)->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getConversation(int $id): array
    {
        return $this->client()->get("conversations/{$id}")->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function createConversation(int $sourceId, int $inboxId, int $contactId, array $additionalAttributes = []): array
    {
        $data = array_merge([
            'source_id' => $sourceId,
            'inbox_id' => $inboxId,
            'contact_id' => $contactId,
        ], $additionalAttributes);

        return $this->client()->post('conversations', $data)->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function updateConversation(int $id, array $data): array
    {
        return $this->client()->patch("conversations/{$id}", $data)->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function toggleConversationPriority(int $id): array
    {
        return $this->client()->post("conversations/{$id}/toggle_priority")->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getConversationMeta(): array
    {
        return $this->client()->get('conversations/meta')->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getMessages(int $conversationId): array
    {
        return $this->client()->get("conversations/{$conversationId}/messages")->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getInboxes(array $params = []): array
    {
        return $this->client()->get('inboxes', $params)->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getInbox(int $id): array
    {
        return $this->client()->get("inboxes/{$id}")->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getInboxAgents(int $id): array
    {
        return $this->client()->get("inboxes/{$id}/assignable_agents")->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getAgents(): array
    {
        return $this->client()->get('agents')->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function addAgent(AgentDTO $data): array
    {
        return $this->client()->post('agents', $data->toArray())->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function updateAgent(int $id, AgentDTO $data): array
    {
        return $this->client()->patch("agents/{$id}", $data->toArray())->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function removeAgent(int $id): array
    {
        return $this->client()->delete("agents/{$id}")->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getTeams(): array
    {
        return $this->client()->get('teams')->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function createTeam(TeamDTO $data): array
    {
        return $this->client()->post('teams', $data->toArray())->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function deleteTeam(int $id): array
    {
        return $this->client()->delete("teams/{$id}")->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getTeamMembers(int $teamId): array
    {
        return $this->client()->get("teams/{$teamId}/team_members")->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function addTeamMember(int $teamId, int $userId): array
    {
        return $this->client()->post("teams/{$teamId}/team_members", ['user_id' => $userId])->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function removeTeamMember(int $teamId, int $userId): array
    {
        return $this->client()->delete("teams/{$teamId}/team_members", ['user_id' => $userId])->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getLabels(): array
    {
        return $this->client()->get('labels')->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function sendMessage(int $conversationId, MessageDTO $message): array
    {
        return $this->client()->post("conversations/{$conversationId}/messages", $message->toArray())->throw()->json();
    }
}
