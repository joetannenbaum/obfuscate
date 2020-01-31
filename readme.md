# Obfuscate

A quick-and-dirty library to obfuscate sensitive strings by dynamically creating special characters to print them out. Not foolproof by any means.

## Installation

```
composer require joetannenbaum/obfuscate
```

## Usage

```php
use Obfuscate\Obfuscate;

require __DIR__ . '/vendor/autoload.php';

echo Obfuscate::str('this is a secret!');
echo Obfuscate::mailto('obfuscate@joe.codes');
```

...results in (different every time, still renders properly in HTML):

```html
&#x74;&#x68;i&#115;&#x20;&#105;&#x73;&#x20;&#97; &#x73;e&#99;&#114;&#x65;&#x74;&#x21;

<a href="&#x6d;&#x61;&#105;&#108;&#116;&#x6f;&#x3a;o&#x62;fu&#x73;&#x63;&#x61;t&#101;&#64;&#106;oe.co&#x64;&#101;s">o&#98;f&#x75;s&#99;&#97;t&#101;&#x40;&#x6a;&#x6f;e&#46;&#99;&#x6f;d&#x65;s</a>
```

## Laravel

If you're using Laravel, this package automatically adds a Blade helper:

```blade
@obfuscate('this is a secret!')
@mailto('obfuscate@joe.codes')
```
