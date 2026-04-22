# Labels and Custom Attributes

Organize and enrich your contacts and conversations with tags (labels) and custom fields.

## Managing Labels (Tags)

Labels in Chatwoot are account-wide. You can manage them for specific resources.

> [!WARNING]
> The `setLabels` methods overwrite the existing list of labels for that resource. To append a label, first fetch the current labels, merge them, and then set the new list.

### Conversation Labels

```php
use Chatwoot;

// Get current labels
$labels = Chatwoot::getConversationLabels($conversationId);

// Set new labels (overwrites)
Chatwoot::setConversationLabels($conversationId, ['support', 'urgent']);
```

### Contact Labels

```php
// Get current labels
$labels = Chatwoot::getContactLabels($contactId);

// Set new labels (overwrites)
Chatwoot::setContactLabels($contactId, ['premium-user', 'lead']);
```

## Custom Attributes

Custom attributes allow you to store additional data (like Order ID, User Plan, etc.).

### Contact Custom Attributes

These are typically managed via the DTO during create/update:

```php
use Alan01777\LaravelChatwoot\DTOs\ContactDTO;

$dto = new ContactDTO(
    name: 'John Doe',
    customAttributes: [
        'order_id' => '12345',
        'is_active' => true
    ]
);

Chatwoot::updateContact($contactId, $dto);
```

### Conversation Custom Attributes

There is a dedicated method for updating attributes in conversations:

```php
Chatwoot::updateConversationCustomAttributes($conversationId, [
    'priority' => 'high',
    'sla_plan' => 'gold'
]);
```
