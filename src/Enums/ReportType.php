<?php

namespace Alan01777\LaravelChatwoot\Enums;

enum ReportType: string
{
    case ACCOUNT = 'account';
    case AGENT = 'agent';
    case INBOX = 'inbox';
    case TEAM = 'team';
}
