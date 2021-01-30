<?php

namespace App\Models;

use App\Mappers\FileToPostMapper;
use Cristal\ApiWrapper\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

/**
 * Class Post
 * @package App\Models
 * @mixin Model
 * @property string $path
 * @property string $slug
 * @property Carbon $date
 * @property string $title
 * @property string $excerpt
 * @property string $preview_image
 * @property string $content
 * @property boolean $published
 * @property array $categories
 */
class Post extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['link'];

    public function getLinkAttribute(): string
    {
        return route('posts.show', ['year' => $this->date->year, 'month' => $this->date->month, 'day' => $this->date->day, 'slug' => $this->slug]);
    }

    public static function all(): Collection
    {
        return Cache::rememberForever('posts', function () {
            return collect(Storage::disk('content')
                ->allFiles('posts'))
                ->map(fn ($file) => FileToPostMapper::map($file))
                ->filter(function (Post $post) {
                    return $post->published;
                })
                ->sortByDesc('date');
        });
    }
}
