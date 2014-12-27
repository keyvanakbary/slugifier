# Slugifier

[![Build Status](https://secure.travis-ci.org/keyvanakbary/slugifier.svg?branch=master)](http://travis-ci.org/keyvanakbary/slugifier)

Just a simple and clean implementation for creating [slugs](http://en.wikipedia.org/wiki/Semantic_URL#Slug)

## Setup and Configuration
Add the following to your `composer.json` file
```json
{
    "require": {
        "keyvanakbary/slugifier": "*"
    }
}
```

Update the vendor libraries

    curl -s http://getcomposer.org/installer | php
    php composer.phar install

## Usage

```php
<?php

include 'vendor/autoload.php';

$slugifier = new \Slugifier();

echo $slugifier->slugify('This is an awesome slug');
//this-is-an-awesome-slug

echo $slugifier->slugify('Cumpleaños del murciélago');
//cumpleanos-del-murcielago

echo $slugifier->slugify('Wikipedia style', '_');
//wikipedia_style
```
