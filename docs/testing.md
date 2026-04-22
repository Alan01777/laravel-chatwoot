# Testing

The package includes robust testing helpers that allow you to fake the Chatwoot integration during unit and feature tests.

## Using `Chatwoot::fake()`

When you call `Chatwoot::fake()`, all subsequent calls through the Facade will be intercepted. Data will be recorded in memory instead of sending real HTTP requests.

```php
use Chatwoot;

public function test_it_sends_a_welcome_message()
{
    // Start faking
    Chatwoot::fake();

    // Your application code...
    $service->welcomeUser($user);

    // Assert a message was sent correctly
    Chatwoot::assertMessageSent(function ($message, $conversationId) {
        return $message->content === 'Welcome!';
    });
}
```

## Available Assertions

The fake implementation provides semantic helpers to verify your application's behavior.

### `assertMessageSent(callable $callback)`

Pass a callback that receives `($messageDTO, $conversationId)`. Return `true` if it matches your expectations.

```php
Chatwoot::assertMessageSent(fn ($m) => $m->content === 'Hello');
```

### `assertContactCreated(callable $callback)`

Pass a callback that receives `($contactDTO)`.

```php
Chatwoot::assertContactCreated(fn ($c) => $c->email === 'test@example.com');
```

## Advanced Verification

If you need to verify other methods (like `updateConversation` or `getLabels`), you can access the recorded calls if needed (though more assertion helpers will be added in future versions).
