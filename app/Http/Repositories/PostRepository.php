<?php

namespace App\Http\Repositories;
use App\Models\Post;

class PostRepository
{
    protected $postModel;

    public function __construct(Post $postModel)
    {
        $this->postModel = $postModel;
    }

    public function createPost(array $data)
    {
        return $this->postModel->create($data);
    }
}