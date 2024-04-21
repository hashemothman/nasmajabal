<?php

namespace App\Models;

use App\Models\Tag;
use App\Traits\UploadImage;
use App\Traits\UploadVideo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory ;
    use  SoftDeletes,UploadImage,UploadVideo;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'summary',
        'description',
        'created_at',
        'deleted_at',
        'language_id',
    ];

    /**
     * Get all the comments for the User
     *
     */
    public function category()
    {
        return $this->belongsToMany(Category::class );
    }
    public function langauges()
    {
        return $this->belongsTo(Language::class,'language_id','id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class );
    }

}
