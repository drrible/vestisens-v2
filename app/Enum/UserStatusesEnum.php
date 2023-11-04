<?php

namespace App\Enum;

enum UserStatusesEnum : string {

case CHILD = 'Ребенок';

case PARENT = 'Родитель';

case TEENAGER = 'Подросток';
case SPECIALIST = 'Профильный специалист';
case DOCTOR = 'Психолог, доктор';
case OTHER = 'Другой';




    public  function text($val){

//        return match($val){
//
//
//            self::CHILD->name  => 'Ребенок',
//            self::PARENT->name  => 'Родитель',
//            self::TEENAGER->name  => 'Подросток',
//
//            self::SPECIALIST->name  => 'Профильный специалист',
//            self::DOCTOR->name  => 'Психолог, доктор',
//            self::OTHER->name  => 'Другой',
//
//        };
    }


}
