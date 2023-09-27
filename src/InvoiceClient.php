<?php

class InvoiceClient
{
    private $client = [];

    public function __construct(public string $title)
    {

    }

    /**
     * Set up the client information and icon
     *
     * @param string $key: The title of the data
     * @param string $content: The detail of the client
     * @param string|null $icon: The icon to represent the data
     */
    public function set(string $key, string $content, ?string $icon = null): self
    {
        $this->client[$key] = [
            "content" => $content,
            "icon" => $icon
        ];
        return $this;
    }

    /**
     * Remove an information about the client
     */
    public function remove(string $key): self
    {
        if(isset($this->client[$key])) {
            unset($this->client[$key]);
        };
        return $this;
    }

    /**
     * Return all added clients
     */
    public function getAll(): array
    {
        return $this->client;
    }

}
