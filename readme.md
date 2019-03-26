# Obfuscate

A quick-and-dirty library to obfuscate sensitive strings in HTML by dynamically creating JavaScript to print them out. Not foolproof by any means.

## Installation

```
composer require joetannenbaum/obfuscate
```

## Usage

```php
use Obfuscate\Obfuscate;

require __DIR__ . '/vendor/autoload.php';

echo Obfuscate::str('<a href="mailto:obfuscate@joe.codes">obfuscate@joe.codes</a>'));
```

...results in (different every time):

```html
<script>
var izbsxrwpgacnfjulthovqmydek = ["o","=",":","f","o","s","\/","h","\"","t","d","\"","c","s",">","t","u","b","e","e","o","c","o","d","l","a","f","e","c","<"," ","<",".","s","o","e","j","e","o",">","a","s","@","r","t","f","a","c","i","u","e",".","a","@","j","o","m","b","e","a"];
var eciujlgqbmpdkfayxrhtvsonzw = [29,25,30,7,43,18,3,1,8,56,25,48,24,9,0,2,0,17,3,16,5,12,25,9,18,42,36,0,18,32,12,0,10,18,5,8,14,0,17,3,16,5,12,25,9,18,42,36,0,18,32,12,0,10,18,5,29,6,25,14];
document.write(eciujlgqbmpdkfayxrhtvsonzw.map(function(c) {
    return izbsxrwpgacnfjulthovqmydek[c];
}).join(''));
</script>
```

## Laravel

If you're using Laravel, this package automatically adds a Blade helper:

```blade
@obfuscate('<a href="mailto:obfuscate@joe.codes">obfuscate@joe.codes</a>')
```
