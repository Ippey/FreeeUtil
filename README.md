# freee Util
freee API用ユーティリティです。認証や各APIクライアントを提供します。

## Freee について
[freee](https://www.freee.co.jp)  
[freee Developers Community](https://developer.freee.co.jp/)
## インストール
```$xslt
composer require ippey/freee-util
```

## 利用方法
### 認可コード生成URL取得
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