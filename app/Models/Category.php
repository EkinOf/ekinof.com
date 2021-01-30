<?php

namespace App\Models;

use Cristal\ApiWrapper\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * Class Category
 * @package App\Models
 * @mixin Model
 * @property string $id
 * @property int $occurrence
 */
class Category extends Model
{

    public function link(): string
    {
        return route('categories', ['id' => $this->id]);
    }

    public static function all(): Collection
    {
        return Cache::rememberForever('categories', function () {
            $categories = collect();
            foreach (Post::all() as $post) {
                foreach ($post->categories as $category) {
                    if (!$categories->contains('id', $category)) {
                        $category = new Category([
                            'id' => $category,
                            'occurrence' => 1
                        ]);
                        $categories->add($category);
                    } else {
                        $categories->where('id', $category)
                            ->map(function ($item, $key) {
                                $item->occurrence++;
                                return $item;
                            });
                    }
                }
            }
            return $categories;
        });
    }
}
