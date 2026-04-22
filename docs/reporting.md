# Reporting API (v2)

This package provides full access to Chatwoot's **API v2** reporting features, allowing you to extract metrics and performance summaries.

## Metrics Summaries

Get aggregated totals for a specific period.

### Account Summary

```php
use Chatwoot;

$summary = Chatwoot::getAccountSummary([
    'since' => now()->subDays(30)->timestamp,
    'until' => now()->timestamp,
]); // Result: ['avg_resolution_time' => ..., 'conversations_count' => ...]
```

### Agent & Inbox Summaries

```php
// Agent performance
$agentSummary = Chatwoot::getAgentSummary($agentId, ['since' => $ts]);

// Inbox performance
$inboxSummary = Chatwoot::getInboxSummary($inboxId, ['since' => $ts]);
```

## Metrics Series (Timeline Data)

Use the `getMetrics` method to get data points over time for graphs.

```php
$metrics = Chatwoot::getMetrics('conversations_count', [
    'type' => 'account',
    'since' => now()->subDays(7)->timestamp,
]);
```

## Real-time Statistics

### Conversation Stats

Get current counts of open, unassigned, and snoozed conversations.

```php
$stats = Chatwoot::getConversationStats();
```

### Leaderboards (Summary Reports)

Get a summary of multiple entities at once, useful for leaderboards.

```php
// List performance of all agents
$ranking = Chatwoot::getSummaryReport('agent', [
    'since' => now()->startOfMonth()->timestamp
]);
```
