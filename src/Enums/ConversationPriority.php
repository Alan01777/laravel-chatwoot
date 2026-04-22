<?php

namespace Alan01777\LaravelChatwoot\Enums;

enum ConversationPriority: string
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';
    case URGENT = 'urgent';
}
