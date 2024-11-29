<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model {
    protected $fillable = [
        'slug',
        'title',
        'excerpt',
        'content',
        'status',
        'image',
        'category_id',
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    protected static function boot(): void {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = static::generateUniqueSlug($post->title);
        });
    }

    protected static function generateUniqueSlug($title): string {
        $slug = Str::slug($title);
        $count = static::where('slug', 'LIKE', "{$slug}%")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }
}
