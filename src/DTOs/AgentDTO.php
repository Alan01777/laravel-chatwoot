<?php

namespace Alan01777\LaravelChatwoot\DTOs;

class AgentDTO
{
    /**
     * @param string $email The email address of the agent.
     * @param string $name The name of the agent.
     * @param string $role The role of the agent (agent, administrator).
     * @param string|null $availabilityStatus Availability status (available, busy, offline).
     */
    public function __construct(
        public readonly string $email,
        public readonly string $name,
        public readonly string $role = 'agent',
        public readonly ?string $availabilityStatus = null
    ) {}

    public function toArray(): array
    {
        return array_filter([
            'email' => $this->email,
            'name' => $this->name,
            'role' => $this->role,
            'availability_status' => $this->availabilityStatus,
        ], fn($value) => !is_null($value));
    }
}
