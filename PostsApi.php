<?php

require_once "JsonFetcher.php";
class PostsApi
{
    private JsonFetcher $fetcher;

    public function __construct(string $domain)
    {
        $this->fetcher = new JsonFetcher($domain . "/posts");
    }

    public function All(): string
    {
        return $this->fetcher->Get();
    }

    public function One($id): string
    {
        if (is_null($id) || $id === "") {
            return "incorrect id";
        }

        return $this->fetcher->Get("/" . $id);
    }

    public function Create($payload): string
    {
        return $this->fetcher->Post($payload);
    }
    public function Remove($id): string
    {
        if (is_null($id) || $id === "") {
            return "incorrect id";
        }

        return $this->fetcher->Delete("/" . $id);
    }
    public function Update($id, $payload): string
    {
        if (is_null($id) || $id === "") {
            return "incorrect id";
        }

        return $this->fetcher->Update("/".$id, $payload);
    }
}