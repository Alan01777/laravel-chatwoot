<?php

namespace Alan01777\LaravelChatwoot\DTOs;

class TeamDTO
{
    /**
     * @param string $name The name of the team.
     * @param string|null $description A description of the team.
     * @param bool|null $allowAutoAssign Whether to allow auto-assignment of conversations.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly ?bool $allowAutoAssign = null
    ) {}

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'description' => $this->description,
            'allow_auto_assign' => $this->allowAutoAssign,
        ], fn($value) => !is_null($value));
    }
}
