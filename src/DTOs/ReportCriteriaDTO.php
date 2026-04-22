<?php

namespace Alan01777\LaravelChatwoot\DTOs;

use Alan01777\LaravelChatwoot\Enums\ReportType;
use DateTimeInterface;

class ReportCriteriaDTO
{
    /**
     * @param DateTimeInterface|int|null $since Start date or timestamp
     * @param DateTimeInterface|int|null $until End date or timestamp
     * @param ReportType|null $type Report type (account, agent, inbox, team)
     * @param int|null $id ID of the entity (for agent, inbox, team)
     */
    public function __construct(
        public readonly DateTimeInterface|int|null $since = null,
        public readonly DateTimeInterface|int|null $until = null,
        public readonly ?ReportType $type = null,
        public readonly ?int $id = null
    ) {}

    public function toArray(): array
    {
        $data = [
            'type' => $this->type?->value,
            'id' => $this->id,
        ];

        if ($this->since) {
            $data['since'] = $this->since instanceof DateTimeInterface 
                ? $this->since->getTimestamp() 
                : $this->since;
        }

        if ($this->until) {
            $data['until'] = $this->until instanceof DateTimeInterface 
                ? $this->until->getTimestamp() 
                : $this->until;
        }

        return array_filter($data, fn($value) => !is_null($value));
    }
}
