<?php

namespace Obfuscate;

class Obfuscate
{
    public static function str($str)
    {
        $parts = str_split($str);

        // Make a copy of the array before shuffling
        $shuffled = $parts;

        shuffle($shuffled);

        $dictionary = array_map(function ($part) use ($shuffled) {
            return array_search($part, $shuffled);
        }, $parts);

        $js_vars = array_map(function ($collection) {
            $az = range('a', 'z');

            shuffle($az);

            $var_name = implode('', $az);

            return [
                'var' => $var_name,
                'arr' => json_encode($collection),
            ];
        }, [$shuffled, $dictionary]);

        list($shuffled_var, $dictionary_var) = $js_vars;

        $script = sprintf(
            implode(
                '',
                [
                '<script>',
                    'var %s = %s;',
                    'var %s = %s;',
                    'document.write(',
                        '%s.map(function(c) { return %s[c]; }).join(\'\')',
                    ');',
                '</script>',
                ]
            ),
            $shuffled_var['var'],
            $shuffled_var['arr'],
            $dictionary_var['var'],
            $dictionary_var['arr'],
            $dictionary_var['var'],
            $shuffled_var['var']
        );

        return $script;
    }
}
