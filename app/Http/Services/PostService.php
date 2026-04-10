<?php

namespace App\Http\Services;

use App\Http\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function createPost($data)
    {
        return $this->postRepository->createPost([
            'description' => $data['description'],
            'media_url' => $data['media_url'],
            $data['user_id'] = Auth::id(),
        ]);
    }
}
