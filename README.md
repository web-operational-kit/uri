# WOK Uri component

## Installation

    composer require wok/uri

## Usage

This component can be used as this but is dedicated to the WOK message component.

``` php
use \WOK\Uri\Uri

$uri = Uri::createFromString('http://domain.tld/path/to/resource?param=abc');
```
