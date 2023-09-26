<?php

require_once "JsonFetcher.php";
class UsersApi
{
    private JsonFetcher $fetcher;

    public function __construct(string $domain)
    {
        $this->fetcher = new JsonFetcher($domain . "/users"); // "/url"
    }

    public function getUsers()
    {
        return $this->fetcher->get();
    }

    public function getUser($id)
    {
        return $this->fetcher->get("/".$id);
    }

    public function getPosts($id)
    {
        return $this->fetcher->get("/" . $id . "/posts");
    }

    public function getTodos($id)
    {
        return $this->fetcher->get("/" . $id . "/todos");
    }
}