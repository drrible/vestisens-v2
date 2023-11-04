<?php

namespace App\Models;
use App\Traits\UploadPhotoTrait;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class News extends Model
{
    use HasApiTokens, HasFactory, Notifiable, UploadPhotoTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title','category_id','show',
        'text_short','text_full',
        'pub_date', 'photo'

    ];






    public function category()
    {

        return $this->belongsTo(NewsCategory::class, 'category_id',);
    }




    public function getFrontDate($dateVal){
        return  Carbon::parse($dateVal)->format('d.m.Y');
    }



    public static function add($fields)
    {
        $obj = new static;
        $obj->fill($fields);

        $obj->save();

        return $obj;
    }

    public function edit($fields)
    {
        $this->fill($fields);

        $this->save();
    }

    public function remove()
    {

        $this->delete();
    }




}
