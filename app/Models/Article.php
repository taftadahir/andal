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
    public const STATUS_DRAFT = 'draft';
    public const STATUS_ARCHIVED = 'archived';
    public const DATE_FORMAT = 'M d, Y';

    protected $fillable = [
        'title',
        'slug',

        'content',
        'excerpt',

        'read_time',
        'status',
        'views',

        'published_at',
        'archived_at',
    ];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',

        'excerpt' => 'string',
        'content' => 'string',

        'status' => 'string',
        'read_time' => 'integer',
        'views' => 'integer',

        'published_at' => 'datetime',
        'archived_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    protected function publishedAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? Carbon::parse($value)->format(Article::DATE_FORMAT) : null ,
        );
    }

    protected function archivedAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? Carbon::parse($value)->format(Article::DATE_FORMAT) : null ,
        );
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->format(Article::DATE_FORMAT) : null,
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->format(Article::DATE_FORMAT) : null,
        );
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value ? $value : Article::STATUS_DRAFT
        );
    }

    // protected function readTime(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn($value) => $value ? floor($value / 60): 0,
    //     );
    // }
    
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
