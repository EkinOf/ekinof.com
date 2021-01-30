<?php


namespace App\Mappers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\CommonMarkConverter;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class FileToPostMapper
{
    public static function map(string $fileName): Post
    {
        $filePath = Storage::disk('content')
                ->getAdapter()
                ->getPathPrefix().$fileName;

        $postMetaData = YamlFrontMatter::parse(file_get_contents($filePath));
        [
            $date,
            $slug,
        ] = explode('.', str_replace('posts/', '', $fileName));

        return new Post([
            'id' => $date.$slug,
            'path' => $filePath,
            'title' => $postMetaData->matter('title'),
            'categories' => explode(', ', strtolower($postMetaData->matter('categories'))),
            'preview_image' => $postMetaData->matter('preview_image'),
            'content' => app(CommonMarkConverter::class)->convertToHtml($postMetaData->body()),
            'date' => Carbon::createFromDate($date),
            'slug' => $slug,
            'excerpt' => $postMetaData->matter('excerpt'),
            'published' => $postMetaData->matter('published'),
        ]);
    }
}
