<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(string $id)
    {
        $category = Category::all()->where('id', $id)->first();
        if ($category === null) {
            abort(404);
        }

        $posts = Post::all()->filter(fn ($post) => in_array($category->id, $post->categories, true));

        return view('category', compact('category', 'posts'));
    }
}
