<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestingCategory extends Model
{
    use HasFactory;


    protected $fillable = [
        'title','desc',
    ];


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




    public function testings(){
        return $this->hasMany(Testing::class, 'category_id');
    }


}
