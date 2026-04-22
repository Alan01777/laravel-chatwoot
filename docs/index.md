# Laravel Chatwoot Documentation

Welcome to the documentation for the `laravel-chatwoot` package. This library provides a professional and robust integration with the Chatwoot API for Laravel applications.

## Documentation Index

- [**Configuration**](configuration.md): Learn how to set up single and multi-account connections.
- [**Basic Usage**](usage.md): Getting started with API calls, Facades, and DTOs.
- [**WhatsApp Templates**](templates.md): How to fetch and send Meta/WhatsApp Business templates.
- [**Media & Attachments**](attachments.md): Sending images, documents, and other files.
- [**Labels & Custom Attributes**](labels-attributes.md): Managing tags and custom fields for contacts and conversations.
- [**Reporting API (v2)**](reporting.md): Accessing metrics, summaries, and real-time statistics.
- [**Testing**](testing.md): Using the built-in testing helpers and `Chatwoot::fake()`.

## Quick Example

```php
use Chatwoot;

// Get all conversations for the default account
$conversations = Chatwoot::getConversations();

// Send a message
Chatwoot::sendMessage($conversationId, new MessageDTO(content: 'Hello!'));
```

## Need Help?

If you find any issues or have suggestions, please open an issue on the [GitHub repository](https://github.com/alan01777/laravel-chatwoot).
