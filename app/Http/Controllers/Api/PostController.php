<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $currentPage = $request->input('current-page')?? 1;
        $postsPerPage = $request->input('posts-per-page')?? 10;

        $posts = Post::all()->skip(($currentPage-1)*$postsPerPage)->take($postsPerPage)->values();

        return response()->json($posts);
    }
}
