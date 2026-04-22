<?php

namespace Alan01777\LaravelChatwoot\Facades;

use Alan01777\LaravelChatwoot\ChatwootManager;
use Illuminate\Support\Facades\Facade;

/**
 * @method static array getContacts(array $params = [])
 * @method static array getContact(int $id)
 * @method static array createContact(\Alan01777\LaravelChatwoot\DTOs\ContactDTO $data)
 * @method static array updateContact(int $id, \Alan01777\LaravelChatwoot\DTOs\ContactDTO $data)
 * @method static array deleteContact(int $id)
 * @method static array searchContacts(string $query)
 * @method static array getConversations(array $params = [])
 * @method static array getConversation(int $id)
 * @method static array createConversation(int $sourceId, int $inboxId, int $contactId, array $additionalAttributes = [])
 * @method static array updateConversation(int $id, array $data)
 * @method static array toggleConversationPriority(int $id)
 * @method static array getConversationMeta()
 * @method static array getMessages(int $conversationId)
 * @method static array getInboxes(array $params = [])
 * @method static array getInbox(int $id)
 * @method static array getInboxAgents(int $id)
 * @method static array getInboxTemplates(int $id)
 * @method static array getAgents()
 * @method static array addAgent(\Alan01777\LaravelChatwoot\DTOs\AgentDTO $data)
 * @method static array updateAgent(int $id, \Alan01777\LaravelChatwoot\DTOs\AgentDTO $data)
 * @method static array removeAgent(int $id)
 * @method static array getTeams()
 * @method static array createTeam(\Alan01777\LaravelChatwoot\DTOs\TeamDTO $data)
 * @method static array deleteTeam(int $id)
 * @method static array getTeamMembers(int $teamId)
 * @method static array addTeamMember(int $teamId, int $userId)
 * @method static array removeTeamMember(int $teamId, int $userId)
 * @method static array getLabels()
 * @method static array sendMessage(int $conversationId, \Alan01777\LaravelChatwoot\DTOs\MessageDTO $message)
 * @method static array sendFile(int $conversationId, mixed $file, ?string $content = null, array $additionalData = [])
 * @method static array getConversationLabels(int $conversationId)
 * @method static array setConversationLabels(int $conversationId, array $labels)
 * @method static array updateConversationCustomAttributes(int $conversationId, array $customAttributes)
 * @method static array getContactLabels(int $contactId)
 * @method static array setContactLabels(int $contactId, array $labels)
 * @method static array getAccountSummary(array $params = [])
 * @method static array getAgentSummary(int $agentId, array $params = [])
 * @method static array getInboxSummary(int $inboxId, array $params = [])
 * @method static array getMetrics(string $metric, array $params = [])
 * @method static array getConversationStats(array $params = [])
 * @method static array getSummaryReport(string $type, array $params = [])
 * @method static \Alan01777\LaravelChatwoot\Testing\ChatwootFake fake()
 * @method static \Alan01777\LaravelChatwoot\Contracts\ChatwootClientInterface account(string $name)
 * 
 * @see \Alan01777\LaravelChatwoot\ChatwootClient
 * @see \Alan01777\LaravelChatwoot\ChatwootManager
 */
class Chatwoot extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ChatwootManager::class;
    }
}
