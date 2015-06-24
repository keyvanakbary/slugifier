# Slugifier

[![Build Status](https://secure.travis-ci.org/keyvanakbary/slugifier.svg?branch=master)](http://travis-ci.org/keyvanakbary/slugifier)

A full-featured, simple and clean implementation for creating [slugs](http://en.wikipedia.org/wiki/Semantic_URL#Slug). No third party libraries or extensions needed.

## Installation

To install this library, run the command below and you will get the latest version

``` bash
composer require keyvanakbary/slugifier
```

## Usage

```php
echo \Slugifier::slugify('JúST å fëw wørds'); // just-a-few-words

echo \Slugifier::slugify('Αυτή είναι μια δοκιμή'); // ayti-einai-mia-dokimi

echo \Slugifier::slugify('Wikipedia style', '_'); // wikipedia_style
```
