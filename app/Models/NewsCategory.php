<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NewsCategory extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title','show'

    ];

    public function news()
    {

        return $this->hasMany(News::class, 'category_id');
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
