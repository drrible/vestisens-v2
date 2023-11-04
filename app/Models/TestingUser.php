<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestingUser extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'test_id',
        'answer',
        'answer_result',
        'answer_recommendations',
    ];

    protected $casts = [
        'created_at' => 'datetime'

    ];




    public function user()
    {
        return $this->belongsTo(User::class,);
    }
    public function testing()
    {
        return $this->hasOne(Testing::class, 'id', 'test_id' );
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
