# Laravel Chatwoot

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alan01777/laravel-chatwoot.svg?style=flat-square)](https://packagist.org/packages/alan01777/laravel-chatwoot)
[![Total Downloads](https://img.shields.io/packagist/dt/alan01777/laravel-chatwoot.svg?style=flat-square)](https://packagist.org/packages/alan01777/laravel-chatwoot)

A robust and professional Laravel package for integrating with the Chatwoot API. Built with a clean architecture using Managers, Facades, and DTOs.

## Features

- **Multi-account Support**: Seamlessly manage multiple Chatwoot connections/accounts.
- **Type-safe DTOs**: Use dedicated objects for Messages, Contacts, Agents, and Teams.
- **WhatsApp/Meta Templates**: Full support for Meta message templates via API.
- **Labels & Custom Attributes**: Extensive support for tagging and enriching data.
- **Reporting API (v2)**: Access metrics and real-time statistics.
- **Testing Helpers**: Robust `Chatwoot::fake()` for reliable unit testing.

## Documentation

Full documentation can be found in the [docs](docs/index.md) directory:

- [Configuration & Multi-account](docs/configuration.md)
- [Basic Usage (DTOs & Facades)](docs/usage.md)
- [Media & Attachments](docs/attachments.md)
- [WhatsApp Templates](docs/templates.md)
- [Labels & Custom Attributes](docs/labels-attributes.md)
- [Reporting API (v2)](docs/reporting.md)
- [Testing & Mocking](docs/testing.md)

## Installation

```bash
composer require alan01777/laravel-chatwoot
```

Publish the config:

```bash
php artisan vendor:publish --tag="chatwoot-config"
```

## Quick Start

```php
use Chatwoot;

// Get all contacts
$contacts = Chatwoot::getContacts();

// Send a simple message
Chatwoot::sendMessage($conversationId, new MessageDTO(content: 'Hi!'));

// Use a specific account
Chatwoot::account('marketing')->getInboxes();
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
