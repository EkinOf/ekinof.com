<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(int $year, int $month, int $day, string $slug)
    {
        $post = Post::all()
            ->where('date', Carbon::createFromDate($year.'-'.$month.'-'.$day))
            ->where('slug', $slug)
            ->first();

        if ($post === null) {
            abort(404);
        }

        return view('post', compact('post'));
    }
}
