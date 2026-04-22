# Configuration

The `laravel-chatwoot` package is designed to be highly configurable, supporting both simple environments and complex multi-account setups.

## Initial Setup

First, publish the configuration file:

```bash
php artisan vendor:publish --tag="chatwoot-config"
```

This will create a `config/chatwoot.php` file in your application.

## Environment Variables

Add your Chatwoot credentials to your `.env` file:

```env
CHATWOOT_BASE_URL=https://app.chatwoot.com
CHATWOOT_ACCOUNT_ID=your_account_id
CHATWOOT_API_ACCESS_TOKEN=your_access_token
```

## Multi-account Support

If your application needs to connect to multiple Chatwoot accounts or instances, you can define them in the `accounts` array in `config/chatwoot.php`:

```php
return [
    'default' => env('CHATWOOT_DEFAULT_ACCOUNT', 'default'),

    'accounts' => [
        'default' => [
            'base_url' => env('CHATWOOT_BASE_URL'),
            'account_id' => env('CHATWOOT_ACCOUNT_ID'),
            'api_access_token' => env('CHATWOOT_API_ACCESS_TOKEN'),
        ],
        'marketing' => [
            'base_url' => 'https://chat.yourdomain.com',
            'account_id' => '2',
            'api_access_token' => 'another_token',
        ],
    ],
];
```

### Switching Accounts at Runtime

You can use the `account()` method on the Facade to switch between defined accounts:

```php
use Chatwoot;

// Uses the default account
$contacts = Chatwoot::getContacts();

// Uses the 'marketing' account
$inboxes = Chatwoot::account('marketing')->getInboxes();
```
