<?php

namespace App\Models;


use App\Enum\UserStatusesEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'about_me_desc',
        'age',
        'status',

        'role',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
//        'status' => UserStatusesEnum::class,
    ];



    public function testingUser()
    {

        return $this->hasMany(TestingUser::class, );
    }


    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
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



    public function getFormattedDate($dateVal){
        return date("Y-m-d", strtotime($dateVal));
//        return  Carbon::createFromFormat('Y-m-d',  $dateVal);
    }
    public function getFrontDate($dateVal){
       return  Carbon::parse($dateVal)->format('d.m.Y');
    }



//    public function setPasswordAttribute($value)
//    {
//        $this->attributes['password'] = bcrypt($value);
//
//    }


    public function generatePassword($password)
    {
        if ($password != null) {
            $this->password = bcrypt($password);
            $this->save();
        }
    }


    public function removePhoto()
    {
        if ($this->photo != null) {
            Storage::delete('uploads/users/' . $this->photo);
        }
    }

    public function uploadPhoto($photo)
    {
        if ($photo == null) {
            return;
        }

        $this->removePhoto();
        $filename = $this->id . '-' . $this->fullname . '-' . $this->birthday_date . '.' . $photo->extension();
        $photo->storeAs('uploads/users/', $filename);
        $this->photo = $filename;
        $this->save();
    }


//    public static function uPhoto($photo, $user)
//    {
//        if ($photo == null) {
//            return;
//        }
//        Photo::removePhoto();
//        $filename = $user->id . '-' . $user->fullname . '-' . $user->birthday_date . '.' . $photo->extension();
//        $photo->storeAs('uploads/employers/', $filename);
//        return $filename;
//    }


    public function getPhoto()
    {
        if ($this->photo == null) {
            return '/images/no-image.png';
        }

        return '/uploads/employers/' . $this->photo;

    }

    public function makeAdmin()
    {
        $this->is_admin = 1;
        $this->save();
    }

    public function makeNormal()
    {
        $this->is_admin = 0;
        $this->save();
    }

    public function toggleAdmin($value)
    {
        if ($value == null) {
            return $this->makeNormal();
        }
        return $this->makeAdmin();
    }

    public function ban()
    {
        $this->status = \App\User::IS_BANNED;
        $this->save();
    }

    public function unban()
    {
        $this->status = User::IS_ACTIVE;
        $this->save();
    }

    public function toggleBan($value)
    {
        if ($value == null) {
            return $this->unban;
        }
        return $this->ban;
    }


    public function remove()
    {

        $this->delete();
    }


    public function checkAdmin()
    {
        return $this->role == 2 ? true : false;
    }


}
