# Slugifier

[![Build Status](https://secure.travis-ci.org/keyvanakbary/slugifier.svg?branch=master)](http://travis-ci.org/keyvanakbary/slugifier)

Just a simple and clean implementation for creating [slugs](http://en.wikipedia.org/wiki/Semantic_URL#Slug). No third party libraries or extensions needed.

## Installation

To install this library, run the command below and you will get the latest version

``` bash
composer require keyvanakbary/slugifier
```

## Usage

```php
<?php

$slugifier = new \Slugifier();

echo $slugifier->slugify('JúST å fëw wørds'); // just-a-few-words

echo $slugifier->slugify('Αυτή είναι μια δοκιμή'); // ayte-einai-mia-dokime

echo $slugifier->slugify('Wikipedia style', '_'); // wikipedia_style
```
