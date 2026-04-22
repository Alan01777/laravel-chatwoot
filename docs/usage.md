# Basic Usage

This section covers the basic operations of the Chatwoot API using the Facade and DTOs.

## The Chatwoot Facade

The `Chatwoot` facade provides a clean interface for all API operations. Most methods return the JSON response from Chatwoot as an associative array.

```php
use Chatwoot;

$conversations = Chatwoot::getConversations(['status' => 'open']);
$contact = Chatwoot::getContact(123);
```

## Using Data Transfer Objects (DTOs)

To ensure type safety and avoid array key errors, this library uses DTOs for creation and update operations.

### Working with Contacts

```php
use Alan01777\LaravelChatwoot\DTOs\ContactDTO;

// Creating a contact
$contact = Chatwoot::createContact(new ContactDTO(
    name: 'John Doe',
    email: 'john@example.com',
    phoneNumber: '+123456789',
    customAttributes: ['source' => 'web_app']
));

// Updating a contact
Chatwoot::updateContact($id, new ContactDTO(name: 'John Edited'));
```

### Working with Conversations

Conversations can be created or updated using the `ConversationDTO` and Enums for status and priority.

```php
use Alan01777\LaravelChatwoot\DTOs\ConversationDTO;
use Alan01777\LaravelChatwoot\Enums\ConversationStatus;
use Alan01777\LaravelChatwoot\Enums\ConversationPriority;

// Creating a conversation
$conversation = Chatwoot::createConversation(new ConversationDTO(
    sourceId: 1,
    inboxId: 1,
    contactId: 1,
    status: ConversationStatus::PENDING
));

// Updating a conversation (e.g. assigning to an agent and resolving)
Chatwoot::updateConversation($id, new ConversationDTO(
    status: ConversationStatus::RESOLVED,
    assigneeId: 42,
    priority: ConversationPriority::HIGH
));
```

### Sending Messages

```php
use Alan01777\LaravelChatwoot\DTOs\MessageDTO;

$message = new MessageDTO(
    content: 'Hello! How can I help you?',
    private: false
);

Chatwoot::sendMessage($conversationId, $message);
```

## Resource Management

### Inboxes & Agents

```php
$inboxes = Chatwoot::getInboxes();
$agents = Chatwoot::getInboxAgents($inboxId);
```

### Teams

```php
$teams = Chatwoot::getTeams();
Chatwoot::addTeamMember($teamId, $userId);
```
