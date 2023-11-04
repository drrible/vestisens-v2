<?php

namespace App\Models;

use App\Enum\TestingResultTypeEnum;
use App\Traits\UploadPhotoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Testing extends Model
{
    use HasFactory, UploadPhotoTrait;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'published',
        'photo',

        'questions',
        'answer_input_type',
        'result_variants',

    ];

    protected $casts = [
        'published' => 'boolean',
        'answer_input_type' => TestingResultTypeEnum::class,
    ];


    public function category()
    {
        return $this->belongsTo(TestingCategory::class, 'category_id',);
    }

    public function userTests(){
        return $this->hasMany(TestingUser::class, 'test_id',);
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






}
