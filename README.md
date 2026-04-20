# Laravel Chatwoot

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alan01777/laravel-chatwoot.svg?style=flat-square)](https://packagist.org/packages/alan01777/laravel-chatwoot)
[![Total Downloads](https://img.shields.io/packagist/dt/alan01777/laravel-chatwoot.svg?style=flat-square)](https://packagist.org/packages/alan01777/laravel-chatwoot)

A robust and professional Laravel package for integrating with the Chatwoot API. Built with a clean architecture using Managers, Facades, and DTOs.

## Features

- **Multi-account Support**: Seamlessly manage multiple Chatwoot accounts/connections in a single project.
- **Elegant Facade**: Use `Chatwoot::getConversations()` for a static, user-friendly interface.
- **Type-safe DTOs**: Avoid array-key mistakes with dedicated Data Transfer Objects for Messages, Contacts, Agents, and Teams.
- **WhatsApp Templates**: Full support for Meta/WhatsApp Business templates via API.
- **Support for Labels & Tags**: Easily manage labels for conversations and contacts.
- **Custom Attributes**: Dedicated support for updating conversation and contact custom attributes.
- **Error Handling**: Automatic exception throwing on 4xx/5xx API responses.

## Installation

You can install the package via composer:

```bash
composer require alan01777/laravel-chatwoot
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="chatwoot-config"
```

## Configuration

Add your Chatwoot credentials to your `.env` file:

```env
CHATWOOT_BASE_URL=https://app.chatwoot.com
CHATWOOT_ACCOUNT_ID=your_account_id
CHATWOOT_API_ACCESS_TOKEN=your_access_token
```

The configuration file `config/chatwoot.php` allows you to define multiple accounts:

```php
'accounts' => [
    'default' => [
        'base_url' => env('CHATWOOT_BASE_URL'),
        'account_id' => env('CHATWOOT_ACCOUNT_ID'),
        'api_access_token' => env('CHATWOOT_API_ACCESS_TOKEN'),
    ],
    'marketing' => [
        'base_url' => '...',
        'account_id' => '...',
        'api_access_token' => '...',
    ],
],
```

## Usage

### Simple API Calls

```php
use Chatwoot;

// Get all contacts
$contacts = Chatwoot::getContacts();

// Get conversations from the default account
$conversations = Chatwoot::getConversations(['status' => 'open']);
```

### Switching Accounts

```php
// Use a specific account defined in config
$inboxes = Chatwoot::account('marketing')->getInboxes();
```

### Sending Messages with DTOs

```php
use Alan01777\LaravelChatwoot\DTOs\MessageDTO;

$message = new MessageDTO(
    content: 'Hello from Laravel!',
    private: false
);

Chatwoot::sendMessage($conversationId, $message);
```

### Sending WhatsApp Templates

```php
$message = new MessageDTO(
    content: 'Fallback text',
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

### Managing Resources (POST/PATCH/DELETE)

```php
use Alan01777\LaravelChatwoot\DTOs\ContactDTO;

// Create a new contact
$contact = Chatwoot::createContact(new ContactDTO(
    name: "John Doe",
    email: "john@example.com"
));

// Update a conversation status
Chatwoot::updateConversation($conversationId, ['status' => 'resolved']);

### Managing Labels and Custom Attributes

```php
// Set labels for a conversation (overwrites existing)
Chatwoot::setConversationLabels($conversationId, ['support', 'priority']);

// Update conversation custom attributes
Chatwoot::updateConversationCustomAttributes($conversationId, [
    'order_id' => '12345'
]);

// Manage contact labels
Chatwoot::setContactLabels($contactId, ['premium-customer']);
```
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
