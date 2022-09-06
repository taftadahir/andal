<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

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

    protected $casts = [
    ];

    protected function publishedAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value == null ? null : Carbon::parse($value)->format('d M Y'),
        );
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
