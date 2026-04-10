<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function createPost(Request $request)
    {
        $data = $request->validate([
            'description' => 'required|string',
            'media_url' => 'required|url',
        ]);

        $data['user_id'] = 1;

        $this->postService->createPost($data);

        return response()->json([
            'message' => 'Create post success'
        ]);
    }
}
