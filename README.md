# freee Util
freee API用ユーティリティです。認証やAPIクライアント、各リクエストオブジェクトを提供します。

[![CircleCI](https://circleci.com/gh/Ippey/FreeeUtil.svg?style=svg)](https://circleci.com/gh/Ippey/FreeeUtil)

## Freee について
[freee](https://www.freee.co.jp)  
[freee Developers Community](https://developer.freee.co.jp/)
## インストール
```$xslt
composer require ippey/freee-util
```

## 利用方法
### 認証
#### 認可コード生成URL取得
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

#### アクセストークン取得
```php
$clientId = 'some client id';
$clientSecret = 'some client secret';
$code = 'authorization code'; // 認可コード生成URLでアクセスして、取得したコード
$erdirectUri = 'https://www.google.co.jp';
$api = Ippey\FreeeUtil\FreeeUtil::getApiClinet();
$request = new Ippey\FreeeUtil\Request\Auth\TokenRequest();
$request->setParameter('client_id', $clientId);
$request->setParameter('client_secret', $clientSecret);
$request->setParameetr('code', $code);
$request->setParameter('redirect_uri', $redirectUri);
$response = $api->sendRequest($request);
print_r($response->getBody()->access_token);
print_r($response->getBody()->refresh_token);
```

#### アクセストークン再取得
```php
$clientId = 'some client id';
$clientSecret = 'some client secret';
$refreshToken = 'some refresh token'; // アクセストークン取得結果内のrefresh_token
$redirectUri = 'https://www.google.co.jp';
$api = Ippey\FreeeUtil\FreeeUtil::getApiClinet();
$request = new Ippey\FreeeUtil\Request\Auth\RefreshRequest();
$request->setParameter('client_id', $clientId);
$request->setParameter('client_secret', $clientSecret);
$request->setParameter('refresh_token', $refreshToken);
$request->setParameter('redirect_uri', $redirectUri);
$response = $api->sendRequest($request);
print_r($response->getBody()->access_token); // 再生成されています
print_r($response->getBody()->refresh_token); // 再生成されています
```

### 連携サービス
#### 連携サービス一覧取得
```php
$accessToken = 'some access token';
$type = 'bank';
$api = Ippey\FreeeUtil\FreeeUtil::getApiClinet();
$request = new Ippey\FreeeUtil\Request\Accounting\BanksRequest();
$request->setAccessToken($accessToken);
$request->setParameter('type', 'bank');
$response = $api->sendRequest($request);
print_r($response->getBody());
```

### ユーザ
#### ログインユーザ情報取得
```php
$accessToken = 'some access token';
$companies = true;
$api = Ippey\FreeeUtil\FreeeUtil::getApiClinet();
$request = new Ippey\FreeeUtil\Request\Account\User\MeRequest();
$request->setParameter('companies', $companies);
$request->setAccessToken($accessToken);
$response = $api->sendRequest($request);
print_r($response->getBody());
```

#### ログインユーザ権限情報取得
```php
$accessToken = 'some access token';
$companyId = 12345;
$api = Ippey\FreeeUtil\FreeeUtil::getApiClinet();
$request = new Ippey\FreeeUtil\Request\Account\User\CapabilitiesRequest();
$request->setAccessToken($accessToken);
$request->setParameter('company_id', $companyId);
$response = $api->sendRequest($request);
print_r($response->getBody());
```
