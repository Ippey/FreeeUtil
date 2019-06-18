# Freee Util
This library is Utility for Freee API.  
This is alpha version.

## Installation
```$xslt
composer require ippey/freee-util
```

## Usage
### Get Authorization URL
```php
$clientId = 'some client id';
$redirectUri = 'https://www.google.co.jp';
$responseType = 'code'; // default is "code"
$url = Ippey\FreeeUtil\FreeeUtil::getAuthorizationUri(
    $clientId,
    $redirecturi,
    $responseType
);
header('Location:' . $url);
```