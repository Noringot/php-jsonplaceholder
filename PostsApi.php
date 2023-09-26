<?php

require_once "JsonFetcher.php";
class PostsApi
{
    private JsonFetcher $fetcher;

    public function __construct(string $domain)
    {
        $this->fetcher = new JsonFetcher($domain . "/posts");
    }

    public function all()
    {
        return $this->fetcher->get();
    }

    public function one($id)
    {
        if (is_null($id) || $id === "") {
            return "incorrect id";
        }

        return $this->fetcher->get("/" . $id);
    }

    public function create($payload)
    {
        return $this->fetcher->post($payload);
    }
    public function remove($id)
    {
        if (is_null($id) || $id === "") {
            return "incorrect id";
        }

        return $this->fetcher->delete("/" . $id);
    }
    public function update($id, $payload)
    {
        if (is_null($id) || $id === "") {
            return "incorrect id";
        }

        return $this->fetcher->update("/".$id, $payload);
    }
}