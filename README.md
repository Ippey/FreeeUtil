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

### アクセストークン取得
```php
$clientId = 'some client id';
$clientSecret = 'some client secret';
$code = 'authorization code'; // 認可コード生成URLでアクセスして、取得したコード
$redirectUti = 'https://www.google.co.jp';

$util = new Ippey\FreeeUtil\FreeeUtil();
$api = $util->getApi('account');
$json = $api->token($clientId, $clientSecret, $code, $redirectUri);
print_r($json->access_token);
print_r($json->refresh_token);
```

### アクセストークン取得
```php
$clientId = 'some client id';
$clientSecret = 'some client secret';
$refreshToken = 'some refresh token'; // アクセストークン取得結果内のrefresh_token
$redirectUti = 'https://www.google.co.jp';

$util = new Ippey\FreeeUtil\FreeeUtil();
$api = $util->getApi('account');
$json = $api->refresh($clientId, $clientSecret, $refreshToken, $redirectUri);
print_r($json->access_token); // 再生成されています
print_r($json->refresh_token); // 再生成されています
```