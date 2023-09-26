<?php

require_once "PostsApi.php";
require_once "UsersApi.php";

$DOMAIN = "https://jsonplaceholder.typicode.com";

$postsApi = new PostsApi($DOMAIN);
echo $postsApi->one(1); // Get post by id
echo $postsApi->all(); // Get all post

$payloadToCreate = [ // Data for creating a new post
    "title" => 'foo',
    "body" => 'bar',
    "userId" => 1,
];

echo $postsApi->create($payloadToCreate); // Create post with data
$postsApi->remove(1); // Delete post by id

$payloadToUpdate = [ // Data for updating post
    "id" => 1,
    "title" => 'foo',
    "body" => 'bar',
    "userId" => 1,
];

echo $postsApi->update(1, $payloadToUpdate); // Update post with new data


$usersApi = new UsersApi($DOMAIN);

echo $usersApi->getUsers(); // Get all users
echo $usersApi->getUser(1); // Get user by id
echo $usersApi->getPosts(1); // Get user's posts
echo $usersApi->getTodos(1); // Get user's todos