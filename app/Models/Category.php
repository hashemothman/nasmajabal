<?php

namespace App\Models;

use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory,UploadImage;

    protected $fillable = [
        'name',
        'summary',
        'language_id',
    ];



    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
    public function langauges()
    {
        return $this->belongsTo(Language::class,'language_id','id');
    }
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
