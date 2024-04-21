<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article_Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'article_id',
        'category_id',
    ];
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

}
