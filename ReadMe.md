# Alipay Global SDK PHP
## Alipay Global A+ SDK
This project is based on [Alipay Global Offical PHP SDK](https://github.com/alipay/global-open-sdk-php)  
Since official SDK mainly shows how to access the alipay gateway and does not contain complete functions such as authorization and auto debit, I have added some logic and further realized the standard interface of Alipay Global A+
## Use
```Shell
composer require NiZerin/alipay-global
```
## How to use
### Initialize
```php
$alipayGlobal = new NiZerin\AliPayGlobal(array(
    'client_id' => 'SANDBOX_5Y3A2N2YEB3002022', // Client ID
    'endpoint_area' => 'ASIA', // Optional: NORTH_AMERIA / ASIA / EUROPE
    'merchantPrivateKey' => '', // Merchant Private Key
    'alipayPublicKey' => '', // Alipay Public Key
    'is_sandbox' => true, // Whether to use the Sandbox environment
));
```
Required fields will be mark with `*`  
### Online payment - Payment - Pay (Cashier Payment)
API: [ac/ams/payment_cashier](https://global.alipay.com/docs/ac/ams/payment_cashier)  
DEMO: [pay/cashier](https://p.yzhan.co/alipay-global-sdk-php/example/?type=pay/cashier)

```php
use NiZerin\Model\CustomerBelongsTo;
use NiZerin\Model\TerminalType;
try {
  $result = $alipayGlobal->payCashier(array(
      'customer_belongs_to' => CustomerBelongsTo::ALIPAY_CN, // * Users pay with Alipay Chinese wallet，Optional: ALIPAY_CN / ALIPAY_HK / TRUEMONEY / TNG / GCASH / DANA / KAKAOPAY / EASYPAISA / BKASH
      'notify_url' => '', // Asynchronous callback Url
      'return_url' => '', // Synchronize callback Url
      'amount' => array(
          'currency' => 'USD', // Currency of payment
          'value' => '1', // Amount of payment
      ),
      'order' => array(
          'id' => null, // Order No
          'desc' => 'Order Desc', // Order Description
          'extend_info' => array(
              'china_extra_trans_info' => array(
                  'business_type' => 'MEMBERSHIP', // Business Type of Order
              ),
          ),
      ),
      'payment_request_id' => null, // Cash payments could be null
      'settlement_strategy' => array(
          'currency' => 'USD', // Currency used for settlement
      ),
      'terminal_type' => TerminalType::WEB, // * Optional: WEB / WAP / APP
      'os_type' => null, // OS System Type
  ));
  header('Location: ' . $result->normalUrl); // Return URL of the alipay cashier
} catch (Exception $e) {
  echo $e->getMessage(); // Output Error
}
```
### Online Payment - Authorization - Consult
API: [ac/ams/authconsult](https://global.alipay.com/docs/ac/ams/authconsult)  

```php
use NiZerin\Tool\IdTool;
use NiZerin\Model\ScopeType;
use NiZerin\Model\TerminalType;
$auth_state = IdTool::CreateAuthState();
try {
    $result = $alipayGlobal->authConsult(array(
        'customer_belongs_to' => CustomerBelongsTo::ALIPAY_CN, // * Users pay with Alipay Chinese wallet，Optional: ALIPAY_CN / ALIPAY_HK / TRUEMONEY / TNG / GCASH / DANA / KAKAOPAY / EASYPAISA / BKASH
        'auth_client_id' => null, // Unique ID of the secondary merchant
        'auth_redirect_url' => '', // * URL that User is redirected to after User agrees to authorize
        'scopes' => array(ScopeType::AGREEMENT_PAY), // * Optional AGREEMENT_PAY / BASE_USER_INFO / USER_INFO / USER_LOGIN_ID / HASH_LOGIN_ID / SEND_OTP
        'auth_state' => $auth_state, // * It will be returned when User agrees to authorize needs to be guaranteed
        'terminal_type' => TerminalType::WEB, // * Optional: WEB / WAP / APP
        'os_type' => null, // OS System Type
    ));
    header('Location: ' . $result->normalUrl); // Return URL of User Authorization page With authCode
} catch (Exception $e) {
    echo $e->getMessage(); // Output Error
}
```
### Online Payment - Authorization - ApplyToken - Using AuthCode
API: [ac/ams/accesstokenapp](https://global.alipay.com/docs/ac/ams/accesstokenapp)  

```php
use NiZerin\Model\CustomerBelongsTo;
use NiZerin\Model\GrantType;
$auth_code = $_GET['authCode'] ?? '';
try {
    $result = $alipayGlobal->authApplyToken(array(
        'grant_type' => GrantType::AUTHORIZATION_CODE, // * Value should be AUTHORIZATION_CODE
        'customer_belongs_to' => CustomerBelongsTo::ALIPAY_CN, // * Users pay with Alipay Chinese wallet，Optional: ALIPAY_CN / ALIPAY_HK / TRUEMONEY / TNG / GCASH / DANA / KAKAOPAY / EASYPAISA / BKASH
        'auth_code' => $auth_code, // * AuthCode get from return URL of User Authorization page
        'refresh_token' => null, // Just leave null
    ));

    $access_token = $result->accessToken; // Access token is used for Aduto Debit
    $access_token_expiry_time = $result->accessTokenExpiryTime; // Access token expiry time
    $refresh_token = $result->refreshToken; // Refresh token is used for update access token
    $refresh_token_expiry_time = $result->refreshTokenExpiryTime; // Refresh token expiry time
    session_start(); // Start Session
    $_SESSION['access_token'] = $access_token; // Store Accesstoken in session
} catch (Exception $e) {
    echo $e->getMessage(); // Output Error
}
```
### Online Payment - Authorization - ApplyToken - Using RefreshToken
API: [ac/ams/accesstokenapp](https://global.alipay.com/docs/ac/ams/accesstokenapp)  

```php
use NiZerin\Model\CustomerBelongsTo;
use NiZerin\Model\GrantType;
$refresh_token = $_GET['refreshToken'] ?? '';
try {
    $result = $alipayGlobal->authApplyToken(array(
        'grant_type' => GrantType::REFRESH_TOKEN, // * Value should be REFRESH_TOKEN
        'customer_belongs_to' => CustomerBelongsTo::ALIPAY_CN, // * Users pay with Alipay Chinese wallet，Optional: ALIPAY_CN / ALIPAY_HK / TRUEMONEY / TNG / GCASH / DANA / KAKAOPAY / EASYPAISA / BKASH
        'auth_code' => null, // Just leave null
        'refresh_token' => $refresh_token, // * RefreshToken get from authApplyToken Using AuthCode
    ));

    $access_token = $result->accessToken; // Access token is used for Aduto Debit
    $access_token_expiry_time = $result->accessTokenExpiryTime; // Access token expiry time
    $refresh_token = $result->refreshToken; // Refresh token is used for update access token
    $refresh_token_expiry_time = $result->refreshTokenExpiryTime; // Refresh token expiry time
    session_start(); // Start Session
    $_SESSION['access_token'] = $result->accessToken; // Store Accesstoken in session
} catch (Exception $e) {
    echo $e->getMessage(); // Output Error
}
```
### Online payment - Payment - Pay (Auto Debit)
API: [ac/ams/payment_agreement](https://global.alipay.com/docs/ac/ams/payment_agreement)  
```php
try {
    session_start();
    $result = $alipayGlobal->payAgreement(array(
        'notify_url' => '', // Asynchronous callback Url
        'return_url' => '', // Synchronous callback Url
        'amount' => array(
            'currency' => 'USD', // Currency of payment
            'value' => '1', // Amount of payment
        ),
        'order' => array(
            'id' => null, // Order No
            'desc' => 'Order Desc', // Order Description
            'extend_info' => array(
                'china_extra_trans_info' => array(
                    'business_type' => 'MEMBERSHIP', // Business Type of Order
                ),
            ),
        ),
        'goods' => array(
            array(
                'id' => null, // Goods ID
                'name' => 'Goods Name', // Goods Name
                'category' => null, // Goods Category
                'brand' => null, // Goods Brand
                'unit_amount' => null, // Goods Charge Unit
                'quantity' => null, // Goods Quantity
                'sku_name' => null, // Goods SKU Name
            ),
        ),
        'merchant' => array( // Secondary merchant Info
            'MCC' => null,
            'name' => null,
            'display_name' => null,
            'address' => null,
            'register_date' => null,
            'store' => null,
            'type' => null,
        ),
        'buyer' => array( // Buyer Info
            'id' => null, // Buyer ID
            'name' => array(
                'first_name' => 'David', // * Buyer First Name
                'last_name' => 'Chen', // * Buyer Last Name
            ),
            'phone_no' => null, // Buyer Phone Number
            'email' => null, // Buyer Email
        ),
        'payment_request_id' => null, // Auto Debit payments could be null
        'payment_method' => array(
            'payment_method_type' => CustomerBelongsTo::ALIPAY_CN, // * Users pay with Alipay Chinese wallet，Optional: ALIPAY_CN / ALIPAY_HK / TRUEMONEY / TNG / GCASH / DANA / KAKAOPAY / EASYPAISA / BKASH
            'payment_method_id' => $_SESSION['access_token'], // * AccessToken returned by applyToken
        ),
        'settlement_strategy' => array(
            'currency' => 'USD', // Currency used for settlement
        ),
        'terminal_type' => TerminalType::WEB, // * Optional: WEB / WAP / APP
        'os_type' => null, // OS Type
    ));
    var_dump($result); // Output Result
} catch (Exception $e) {
    echo $e->getMessage(); // Output Error
}
```
### Online payment - Payment - NotifyPayment
API: [ac/ams/paymentrn_online](https://global.alipay.com/docs/ac/ams/paymentrn_online)  
```php
try {
    $notify = $alipayGlobal->getNotify(); // Get Asynchronous Payment Notifications
    // Do something

    $alipayGlobal->sendNotifyResponseWithRSA(); // Tell Alipay Global the notice has been received and there is no need to send it again
} catch (Exception $e) {
    echo $e->getMessage(); // Output Error
}
```
### Online Payment - Authorization - NotifyAuthorization
API: [ac/ams/notifyauth](https://global.alipay.com/docs/ac/ams/notifyauth)
```php
try {
    $notify = $alipayGlobal->getNotify(); // Get Asynchronous Authorization Notifications
    // Do something
    $rsqBody = $notify->getRsqBody(); // Get Response Body of Notification
    $authorization_notify_type = $reqBody->authorizationNotifyType; // Determine Notification Type
    if ($authorization_notify_type === 'AUTHCODE_CREATED') { // If Notification Type is sent AuthCode
        $_SESSION['auth_code'] = $reqBody->authCode; // Get AuthCode
    }

    $alipayGlobal->sendNotifyResponseWithRSA(); // Tell Alipay Global the notice has been received and there is no need to send it again
} catch (Exception $e) {
    echo $e->getMessage(); // Output Error
}
```
### Return Url
```php
/** Return immediately after payment or authorization
 * After Payment, user will be redirected only
 * After Authorization, user will be redirected with authCode
 * Suggestion: The Return URL is only used as a reminder
 * It's beter to process business in asynchronous payment notification and asynchronous authorization notification
**/
echo 'Payment Or Authorization completed';
```