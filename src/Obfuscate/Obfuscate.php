<?php

namespace Obfuscate;

class Obfuscate
{
    public static function str($str)
    {
        return array_reduce(str_split($str), function ($carry, $current) {
            return $carry . self::getSymbol($current);
        }, '');
    }

    public static function getSymbol($letter)
    {
        if (ord($letter) > 128) {
            return $letter;
        }

        // To properly obfuscate the value, we will randomly convert each letter to
        // its entity or hexadecimal representation, keeping a bot from sniffing
        // the randomly obfuscated letters out of the string on the responses.
        switch (rand(1, 3)) {
            case 1:
                return '&#' . ord($letter) . ';';
            case 2:
                return '&#x' . dechex(ord($letter)) . ';';
            case 3:
                return $letter;
        }
    }

    public static function mailto($email)
    {
        return sprintf(
            '<a href="%s%s">%s</a>',
            self::str('mailto:'),
            self::str($email),
            self::str($email)
        );
    }
}
