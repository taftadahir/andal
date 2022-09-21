<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'original_name',
        'name',
        'extension'
    ];

    protected $hidden = [
        'deleted_at',
    ];

    protected $casts = [
    ];

    // Relationships
    public function articles()
    {
        return $this->hasMany(Article::class, 'banner');
    }
}
