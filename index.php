<?php

require_once "PostsApi.php";
require_once "UsersApi.php";

$DOMAIN = "https://jsonplaceholder.typicode.com";

$postsApi = new PostsApi($DOMAIN);
echo $postsApi->One(1); // Get post by id
echo $postsApi->All(); // Get all post

$payloadToCreate = [ // Data for creating a new post
    "title" => 'foo',
    "body" => 'bar',
    "userId" => 1,
];

echo $postsApi->Create($payloadToCreate); // Create post with data
$postsApi->Remove(1); // Delete post by id

$payloadToUpdate = [ // Data for updating post
    "id" => 1,
    "title" => 'foo',
    "body" => 'bar',
    "userId" => 1,
];

echo $postsApi->Update(1, $payloadToUpdate); // Update post with new data


$usersApi = new UsersApi($DOMAIN);

echo $usersApi->GetUsers(); // Get all users
echo $usersApi->GetUser(1); // Get user by id
echo $usersApi->GetPosts(1); // Get user's posts
echo $usersApi->GetTodos(1); // Get user's todos