<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    public const STATUS_PUBLISHED = 'published';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'read_time',
        'status',
        'published_at',
        'archived_at',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    protected function publishedAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value == null ? null : Carbon::parse($value)->format('M d, Y'),
        );
    }

    protected function readTime(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value == null ? 0 : floor($value / 60),
        );
    }
    
    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::slug($value),
        );
    }

    // Scope
    public function scopePublished($query)
    {
        return $query->where('status', Article::STATUS_PUBLISHED);
    }

    // Relationships
    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function banner()
    {
        return $this->belongsTo(Asset::class, 'banner');
    }
}
