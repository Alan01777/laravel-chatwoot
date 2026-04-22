<?php

namespace Alan01777\LaravelChatwoot;

use Alan01777\LaravelChatwoot\Contracts\ChatwootClientInterface;
use InvalidArgumentException;

class ChatwootManager
{
    /**
     * The active connection instances.
     */
    protected array $accounts = [];

    /**
     * The fake instance.
     */
    protected ?ChatwootClientInterface $fake = null;

    public function __construct(protected $app) {}

    /**
     * Get a chatwoot account instance.
     */
    public function account(?string $name = null): ChatwootClientInterface
    {
        if ($this->fake) {
            return $this->fake;
        }

        $name = $name ?: $this->getDefaultAccount();

        if (!isset($this->accounts[$name])) {
            $this->accounts[$name] = $this->makeAccount($name);
        }

        return $this->accounts[$name];
    }

    /**
     * Make the account instance.
     */
    protected function makeAccount(string $name): ChatwootClientInterface
    {
        $config = $this->getConfig($name);

        return new ChatwootClient(
            $config['base_url'],
            $config['account_id'],
            $config['api_access_token']
        );
    }

    /**
     * Get the configuration for an account.
     */
    protected function getConfig(string $name): array
    {
        $config = $this->app['config']["chatwoot.accounts.{$name}"];

        if (is_null($config)) {
            throw new InvalidArgumentException("Chatwoot account [{$name}] is not defined.");
        }

        return $config;
    }

    /**
     * Get the default account name.
     */
    public function getDefaultAccount(): string
    {
        return $this->app['config']['chatwoot.default'] ?? 'default';
    }

    /**
     * Create a fake instance.
     */
    public function fake(): ChatwootClientInterface
    {
        $this->fake = new Testing\ChatwootFake();

        return $this->fake;
    }

    /**
     * Dynamically pass methods to the default account.
     */
    public function __call(string $method, array $parameters)
    {
        return $this->account()->$method(...$parameters);
    }
}
