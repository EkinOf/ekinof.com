<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Str;

class PageController extends Controller
{
    public function home()
    {
        $posts = Post::all()->take(10)->values();
        $currentPage = 1;
        $postsPerPage = 10;
        $pages = ceil(Post::all()->count()/10);
        return view('home', compact('posts', 'currentPage', 'postsPerPage', 'pages'));
    }

    public function about()
    {
        return view('about');
    }

    public function search(Request $request)
    {
        $search = $request->input('query');
        $posts = collect();
        if ($search !== '') {
            $posts = Post::all()
                ->filter(
                    fn ($post) => Str::of($post->title)->lower()->contains(strtolower($search)) ||
                        Str::of(implode(',', $post->categories))->contains(strtolower($search)) ||
                        Str::of($post->content)->lower()->contains(strtolower($search))
                    );
        }

        return view('search', compact('posts', 'search'));
    }
}
