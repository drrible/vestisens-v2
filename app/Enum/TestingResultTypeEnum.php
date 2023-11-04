<?php

namespace App\Enum;

enum TestingResultTypeEnum : string {

case EMPTY = 'empty';

case SELECT = 'select';
case RADIO = 'radio';

case INPUT = 'input';
case INPUT_FROM_IMAGE = 'input_from_image';
case RADIO_FROM_IMAGE = 'radio_from_image';

case RADIO_FROM_AUDIO = 'radio_from_audio';

//    public static function text(string $string): string
//    {
//        return match($this->value){
//         self::INPUT->value => 'Ввод',
//         self::SELECT->value => 'Выбор',
//        };
//    }

//            self::SELECT->value  => 'Выбор',
//            self::RADIO->value  => 'Переключатель',

    public static function options()
    {
        return  collect([
            self::EMPTY->value  => 'Без теста',
            self::INPUT->value  => 'Ввод',

            self::INPUT_FROM_IMAGE->value  => 'Картинка и Ввод',
            self::RADIO_FROM_IMAGE->value  => 'Картинка и Переключатель',
            self::RADIO_FROM_AUDIO->value  => 'Аудиозапись и Переключатель',
        ]);
    }


    public function text(){
        return match($this->value){
            self::EMPTY->value  => 'Без теста',
            self::INPUT->value  => 'Ввод',
            self::RADIO->value  => 'Переключатель',

            self::INPUT_FROM_IMAGE->value  => 'Картинка и Ввод',
            self::RADIO_FROM_IMAGE->value  => 'Картинка и Переключатель',
            self::RADIO_FROM_AUDIO->value  => 'Аудиозапись и Переключатель',

        };
    }
}
