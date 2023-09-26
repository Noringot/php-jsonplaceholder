<?php

require_once "JsonFetcher.php";
class UsersApi
{
    private JsonFetcher $fetcher;

    public function __construct(string $domain)
    {
        $this->fetcher = new JsonFetcher($domain . "/users"); // "/url"
    }

    public function GetUsers(): string
    {
        return $this->fetcher->Get();
    }

    public function GetUser($id): string
    {
        return $this->fetcher->Get("/".$id);
    }

    public function GetPosts($id): string
    {
        return $this->fetcher->Get("/" . $id . "/posts");
    }

    public function GetTodos($id): string
    {
        return $this->fetcher->Get("/" . $id . "/todos");
    }
}