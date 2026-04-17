<?php

namespace Alan01777\LaravelChatwoot\DTOs;

class ContactDTO
{
    /**
     * @param string $name The name of the contact.
     * @param string|null $email The email address of the contact.
     * @param string|null $phoneNumber The phone number of the contact.
     * @param array|null $customAttributes Additional custom attributes.
     * @param string|null $avatarUrl URL of the contact's avatar.
     * @param string|null $identifier An external identifier for the contact.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $email = null,
        public readonly ?string $phoneNumber = null,
        public readonly ?array $customAttributes = null,
        public readonly ?string $avatarUrl = null,
        public readonly ?string $identifier = null
    ) {}

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phoneNumber,
            'custom_attributes' => $this->customAttributes,
            'avatar_url' => $this->avatarUrl,
            'identifier' => $this->identifier,
        ], fn($value) => !is_null($value));
    }
}
