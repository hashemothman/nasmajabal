<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article_Tags extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'article_id',
        'tag_id',
    ];
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class ,'article_id');
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'tag_id');
    }
}
