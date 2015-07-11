# Slugifier

[![Build Status](https://secure.travis-ci.org/keyvanakbary/slugifier.svg?branch=master)](http://travis-ci.org/keyvanakbary/slugifier)

A full-featured, simple and clean implementation for creating [slugs](http://en.wikipedia.org/wiki/Semantic_URL#Slug). No third party libraries or extensions needed.

## Installation

``` bash
composer require keyvanakbary/slugifier
```

## Usage

```php
\Slugifier::slugify('JúST å fëw wørds'); // just-a-few-words

\Slugifier::slugify('Αυτή είναι μια δοκιμή'); // ayti-einai-mia-dokimi

\Slugifier::slugify('Wikipedia style', '_'); // wikipedia_style
```

### Modifiers

Sometimes the default character map is not accurate enough. Slugifier supports custom *modifiers*

```php
\Slugifier::slugify('Pingüino', '-', array('ü' => 'u'))); // pinguino
```

Some language iso modifiers are supported

```php
\Slugifier::slugify('Estaĵo', '-', \Slugifier::mod('eo')); // estajxo

\Slugifier::slugify('Örnektir', '-', \Slugifier::mod('tr')); // ornektir
```
