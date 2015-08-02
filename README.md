# Slugifier

[![Build Status](https://secure.travis-ci.org/keyvanakbary/slugifier.svg?branch=master)](http://travis-ci.org/keyvanakbary/slugifier)

A full-featured, simple, clean and pure functional implementation for creating [slugs](http://en.wikipedia.org/wiki/Semantic_URL#Slug). No third party libraries or extensions needed.

## Installation

``` bash
composer require keyvanakbary/slugifier
```

## Usage

```php
use slugifier as s;

s\slugify('JúST å fëw wørds'); // just-a-few-words

s\slugify('Αυτή είναι μια δοκιμή'); // ayti-einai-mia-dokimi

s\slugify('Wikipedia style', '_'); // wikipedia_style
```

### Modifiers

Sometimes the default character map is not accurate enough. Slugifier supports custom *modifiers*

```php
s\slugify('Pingüino', '-', ['ü' => 'u'])); // pinguino
```

Some [language iso code](https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes) modifiers are supported

```php
s\slugify('Estaĵo', '-', s\MOD['eo']); // estajxo

s\slugify('Örnektir', '-', s\MOD['tr']); // ornektir
```
