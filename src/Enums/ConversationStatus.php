<?php

namespace Alan01777\LaravelChatwoot\Enums;

enum ConversationStatus: string
{
    case OPEN = 'open';
    case RESOLVED = 'resolved';
    case PENDING = 'pending';
    case SNOOZED = 'snoozed';
    case ALL = 'all';
}
