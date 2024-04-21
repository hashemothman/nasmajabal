<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


trait UploadImage
{
    public function images(){
        return $this->morphMany(Image::class,'imagable');
    }

    // public function StoreImage($photo ,$folder,$disk ='public' ){
    //     $file_extention =time().$photo->getClientOriginalName();
    //     $path=$photo->storeAs($folder ,$file_extention,$disk);

    //     return $path;
    // }
    public function StoreImage($img, $folderName,$disk='images')
    {
        $photo = time().$img->getClientOriginalName();
        $path = $img->storeAs($folderName, $photo, $disk);
        return $path;
    }

    public function DeleteImage($path,$image){
          File::delete($path.$image->url);
          Image::find($image->id)->delete();
    }

    public function ValidateImage($image){
        return $image->validate(['url'=>'required|image|mimes:jpeg,png,jpg,gif']);
    }

}
