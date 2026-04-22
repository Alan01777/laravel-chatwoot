# Reporting API (v2)

This package provides full access to Chatwoot's **API v2** reporting features using structured criteria.

## Using `ReportCriteriaDTO`

All reporting methods now accept a `ReportCriteriaDTO` to ensure type safety and ease of use.

```php
use Alan01777\LaravelChatwoot\DTOs\ReportCriteriaDTO;
use Alan01777\LaravelChatwoot\Enums\ReportType;

$criteria = new ReportCriteriaDTO(
    since: now()->subDays(30), // Accepts Carbon/DateTime or timestamp
    until: now(),
    type: ReportType::ACCOUNT
);
```

## Metrics Summaries

### Account Summary

```php
use Chatwoot;

$summary = Chatwoot::getAccountSummary($criteria); 
// Result: ['avg_resolution_time' => ..., 'conversations_count' => ...]
```

### Agent & Inbox Summaries

```php
// Agent performance
$agentSummary = Chatwoot::getAgentSummary($agentId, $criteria);

// Inbox performance
$inboxSummary = Chatwoot::getInboxSummary($inboxId, $criteria);
```

## Metrics Series (Timeline Data)

```php
$metrics = Chatwoot::getMetrics('conversations_count', $criteria);
```

## Real-time Statistics

### Conversation Stats

```php
$stats = Chatwoot::getConversationStats($criteria);
```

### Leaderboards (Summary Reports)

```php
// List performance of all agents
$ranking = Chatwoot::getSummaryReport('agent', $criteria);
```
