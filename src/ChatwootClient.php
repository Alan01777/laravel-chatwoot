<?php

namespace Alan01777\LaravelChatwoot;

use Alan01777\LaravelChatwoot\Contracts\ChatwootClientInterface;
use Alan01777\LaravelChatwoot\DTOs\AgentDTO;
use Alan01777\LaravelChatwoot\DTOs\ContactDTO;
use Alan01777\LaravelChatwoot\DTOs\ConversationDTO;
use Alan01777\LaravelChatwoot\DTOs\MessageDTO;
use Alan01777\LaravelChatwoot\DTOs\ReportCriteriaDTO;
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
    private function client(string $version = 'v1'): PendingRequest
    {
        return Http::withHeaders([
            'api_access_token' => $this->apiAccessToken,
            'Accept' => 'application/json',
        ])->baseUrl("{$this->baseUrl}/api/{$version}/accounts/{$this->accountId}/");
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
    public function createConversation(ConversationDTO $data): array
    {
        return $this->client()->post('conversations', $data->toArray())->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function updateConversation(int $id, ConversationDTO $data): array
    {
        return $this->client()->patch("conversations/{$id}", $data->toArray())->throw()->json();
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
    public function getInboxTemplates(int $id): array
    {
        $response = $this->getInbox($id);

        return $response['message_templates'] ?? [];
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

    /**
     * {@inheritdoc}
     */
    public function sendFile(int $conversationId, mixed $file, ?string $content = null, array $additionalData = []): array
    {
        $request = $this->client()->asMultipart();

        if ($content) {
            $request->attach('content', $content);
        }

        // Add additional data (message_type, private, etc)
        $data = array_merge([
            'message_type' => 'outgoing',
            'private' => 'false',
        ], $additionalData);

        foreach ($data as $key => $value) {
            $request->attach($key, is_bool($value) ? ($value ? 'true' : 'false') : (string) $value);
        }

        // Handle file
        if ($file instanceof \Illuminate\Http\UploadedFile) {
            $request->attach(
                'attachments[]',
                fopen($file->getRealPath(), 'r'),
                $file->getClientOriginalName()
            );
        } elseif (is_string($file) && file_exists($file)) {
            $request->attach(
                'attachments[]',
                fopen($file, 'r'),
                basename($file)
            );
        } else {
            throw new \InvalidArgumentException('Invalid file provided. Must be a valid file path or an UploadedFile instance.');
        }

        return $request->post("conversations/{$conversationId}/messages")->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getConversationLabels(int $conversationId): array
    {
        return $this->client()->get("conversations/{$conversationId}/labels")->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function setConversationLabels(int $conversationId, array $labels): array
    {
        return $this->client()->post("conversations/{$conversationId}/labels", ['labels' => $labels])->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function updateConversationCustomAttributes(int $conversationId, array $customAttributes): array
    {
        return $this->client()->post("conversations/{$conversationId}/custom_attributes", ['custom_attributes' => $customAttributes])->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getContactLabels(int $contactId): array
    {
        return $this->client()->get("contacts/{$contactId}/labels")->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function setContactLabels(int $contactId, array $labels): array
    {
        return $this->client()->post("contacts/{$contactId}/labels", ['labels' => $labels])->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getAccountSummary(?ReportCriteriaDTO $params = null): array
    {
        $parameters = array_merge(['type' => 'account'], $params?->toArray() ?? []);
        return $this->client('v2')->get('reports/summary', $parameters)->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getAgentSummary(int $agentId, ?ReportCriteriaDTO $params = null): array
    {
        $parameters = array_merge(['type' => 'agent', 'id' => $agentId], $params?->toArray() ?? []);
        return $this->client('v2')->get('reports/summary', $parameters)->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getInboxSummary(int $inboxId, ?ReportCriteriaDTO $params = null): array
    {
        $parameters = array_merge(['type' => 'inbox', 'id' => $inboxId], $params?->toArray() ?? []);
        return $this->client('v2')->get('reports/summary', $parameters)->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getMetrics(string $metric, ?ReportCriteriaDTO $params = null): array
    {
        $parameters = array_merge(['metric' => $metric], $params?->toArray() ?? []);
        return $this->client('v2')->get('reports', $parameters)->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getConversationStats(?ReportCriteriaDTO $params = null): array
    {
        return $this->client('v2')->get('reports/conversations', $params?->toArray() ?? [])->throw()->json();
    }

    /**
     * {@inheritdoc}
     */
    public function getSummaryReport(string $type, ?ReportCriteriaDTO $params = null): array
    {
        return $this->client('v2')->get("summary_reports/{$type}", $params?->toArray() ?? [])->throw()->json();
    }
}
