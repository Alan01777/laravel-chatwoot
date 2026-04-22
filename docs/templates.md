# WhatsApp & Meta Templates

The library provides first-class support for Meta/WhatsApp Business templates via the Chatwoot API.

## Fetching Available Templates

You can fetch all templates associated with a specific WhatsApp inbox:

```php
use Chatwoot;

$templates = Chatwoot::getInboxTemplates($inboxId);

// Returns an array of templates with components, status, etc.
foreach ($templates as $template) {
    echo $template['name'];
}
```

## Sending Messages with Templates

To send a template message, use the `templateParams` property of the `MessageDTO`.

```php
use Alan01777\LaravelChatwoot\DTOs\MessageDTO;

$message = new MessageDTO(
    content: 'Fall-back text for standard channels',
    templateParams: [
        "name" => "hello_world",
        "category" => "MARKETING",
        "language" => "en_US",
        "processed_params" => [
            "body" => ["1" => "Customer Name"]
        ]
    ]
);

Chatwoot::sendMessage($conversationId, $message);
```

### Understanding `processed_params`

Inside `templateParams`, the `processed_params` key is used by Chatwoot to map variables (like `{{1}}`, `{{2}}`) to actual values.
- `body`: Maps variables in the message body.
- `header` (if available): Maps variables in the template header.
