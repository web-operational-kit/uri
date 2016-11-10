# Uri

This library is a URI manager interface.

**Diclaimer :** This component is part of the [WOK](https://github.com/web-operational-kit/) (Web Operational Kit) framework. It however can be used as a standalone library.


## Install

It is recommanded to install that component as a dependency using [Composer](https://getcomposer.org/) :

    composer require wok/uri


You're also free to get it with [git](https://git-scm.com/) or by [direct download](https://github.com/web-operational-kit/uri/archive/master.zip) while this package has no dependencies.

    git clone https://github.com/web-operational-kit/uri.git


## Usage

``` php
use \WOK\Uri\Uri

// First instanciate a URI object
$uri = Uri::createFromString('http://domain.tld/path/to/resource?param=abc');

// Then you can either retrieve informations ...
$uri->getScheme();


// ... or update them


```

Checkout the full [methods and components list](#methods-and-components) as API.

### Methods and components

**Tip**:
- Methods prefixed with `get`X return the value or associated object
- Methods prefixed with `set`X override the current value or associated object
- Methods prefixed with `with`X clone the current Uri object with the new value.


#### String values

- `getScheme()`
- `setScheme($scheme)`
- `withScheme(scheme)`

- `getFragment()`
- `setFragment($fragment)`
- `withFragment(fragment)`

#### Host component

- `getHost()`
- `setHost($host)`
- `withHost($host)`

#### Path component

- `getPath()`
- `setPath($path)`
- `withPath($path)`

#### Query component


- `getQuery()`
- `setQuery($query)`
- `withQuery($query)`

#### User component

- `getUser()`
- `setUser($user)`
- `withUser($user)`
