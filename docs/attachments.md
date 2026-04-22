# Media & Attachments

This library makes it easy to send files (images, documents, audio, video) to Chatwoot conversations using a single method.

## Sending Files

The `sendFile` method handles the complex `multipart/form-data` request for you. It accepts either a local file path or a Laravel `UploadedFile` instance.

### Using a Local File Path

```php
use Chatwoot;

Chatwoot::sendFile($conversationId, storage_path('app/public/image.png'));

// With optional caption/content and metadata
Chatwoot::sendFile(
    conversationId: $conversationId,
    file: '/path/to/invoice.pdf',
    content: 'Here is your invoice for last month.',
    additionalData: [
        'private' => true // Sends as an internal note
    ]
);
```

### Using a Laravel UploadedFile

Perfect for handling file uploads from a request:

```php
public function store(Request $request)
{
    Chatwoot::sendFile($conversationId, $request->file('document'));
}
```

## How it Works

The `sendFile` method:
1.  Sets the request to `multipart/form-data`.
2.  Attaches the file under the `attachments[]` key (as required by Chatwoot).
3.  Maps the `content` and optional `message_type` / `private` fields.

## Testing Attachment Uploads

You can use the built-in assertion to verify that files were sent correctly:

```php
Chatwoot::fake();

// ... logic ...

Chatwoot::assertFileSent(function ($file, $conversationId, $content) {
    return $conversationId === 123 && $content === 'My Caption';
});
```
