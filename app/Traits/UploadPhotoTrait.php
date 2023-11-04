<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadPhotoTrait
{

    protected $folderName;

    public function __construct(){

        $this->folderName = class_basename($this);
    }



    public function removePhoto()
    {
        if ($this->photo != null) {
            Storage::delete("uploads/".$this->folderName."/" . $this->photo);
        }
    }

    public function uploadPhoto($photo)
    {

        if ($photo == null) {
            return;
        }

        $this->removePhoto();
        $filename =  Str::slug($this->id . '_' . time() . '_' . Str::random(10)) . '.' . $photo->getClientOriginalExtension();
        $photo->storeAs("/uploads/".$this->folderName."/", $filename);

        $this->photo = $filename;
        $this->save();
    }



    public function getPhoto()
    {

        if ($this->photo == null) {
            return '/images/no-news-image.svg1';
        }

        return "/storage/uploads/".$this->folderName."/".$this->photo ;
    }


}
