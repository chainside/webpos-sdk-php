<!--
Nigiri auto-generated file
-->
<p>
    <img src="https://www.chainside.net/wp-content/themes/chainside2018/assets/favicon/favicon-192.png" alt="chainside" width="80">
    <br /><br />
    developed with :heart: by <a href="https://www.chainside.net">chainside</a>
</p>

<!-- START doctoc -->
<!-- END doctoc  -->

# Introduction

This project is the **official** SDK library for the integration with the [Chainside Pay](https://chainside.net) Platform. It is an extension of the [sdk-boilerplate]() library.

# Installation

Follow these steps to install the SDK library into your system:

## Install with composer

```bash
composer require chainside\webpos-sdk
```

Then include it in your script:

```php
<?php

require_once '/path/to/vendor/autoload.php';

// ... use the library

```

## Support for Laravel

For **Laravel 5.5+** there is non need to do any further step since the package uses the [Laravel Autodiscovery Feature](https://laravel.com/docs/packages#package-discovery).

For *Laravel 5.4 and below* you need to follow these steps:

Include the Service Provider in your `config/app.php` file under the key `providers`

```php
<?php

/* config/app.php */

// ...

'providers' => [
    // ...
    Chainside\SDK\WebPos\Laravel\ChainsideWebPosSdkServiceProvider::class
],


```

**Optional:** include the Facade in your `config/app.php` file under the key `aliases`

```php
<?php

/* config/app.php */

// ...

'aliases' => [
    // ...
    'ChainsideWebPosClient' => Chainside\SDK\WebPos\Laravel\Facades\Client::class,
    'ChainsideWebPosCallbackHandler' => Chainside\SDK\WebPos\Laravel\Facades\CallbackHandler::class,
],

```

# Structure

The following sections will describe the high level structure of the
SDK library.

## Configuration

In order to be able to configure your SDK client you have to set some
configuration parameters. Here is the list of the configuration parameters
used by the library:

| Parameter | Type | Required | Default | Description |
|-----------|------|----------|---------|-------------|
| **mode** | _string_ | Yes | `live` | The SDK mode, can be `sandbox` or `live` |
| **client_id** | _string_ | Yes | `null` | Your WebPos client id |
| **secret** | _string_ | Yes | `null` | Your WebPos secret |
| **http**   | _array_  | No  | | Http Client additional configuration  |
| **cache_directory** | _string_ | No | `/tmp/chainside_sdk_cache` | The directory where to store the cache file |

### HTTP Client Configuration

To customize the HTTP client configuration please see the [Guzzle Docs](http://docs.guzzlephp.org/en/stable/quickstart.html)

### Cache Configuration

By default, the SDK library uses a file cache as caching system. You can specify a different file location by changing the
*cache_directory* config variable.

**NOTE:** When using the library with Laravel, the sdk will automatically use the caching driver specified
in the Laravel configuration.

## Client

The Library exposes a _client_ object which is instantiated with the system configuration and
provides an high-level interface to send requests. Client's instances take care of compiling and
sending http request and parse responses into [SdkObject](#Objects) instances.

## Objects

The library defines an SdkObject class which is extended by actual objects which represent Chainside-Pay
API requests and response bodies. Every json object defined in the API has a corresponding SdkObject
class which is either the input of a _client_ instance method (for creation) or returned (for reading)

## Callbacks

Callbacks are requests sent by the server to your application in order
to notify about some events. Every callback is sent **only to HTTPS**
webhooks and will be securely signed by the server in order to be verified.

# Usage

The following sections will describe how to use the SDK library and
all the detail needed to integrate your business with Chainside Pay.

## Instantiate the client

In order to communicate with our backend first you need to instantiate
the client:

```php
<?php

use Chainside\SDK\WebPos\Client;

$config = [
    'mode' => 'live',
    'client_id' => 'CLIENT_ID',
    'secret' => 'SECRET'
];

$client = new Client($config);

```

or if running in Laravel:

```php
<?php

// Using the IoC
$client = app('chaniside.sdk.webpos');

// Using the Facade, you can directly instantiate run an action

$response = \ChainsideWebPosClient::clientCredentialsLogin(...);

```


Once the client is instantiated and configured, you can use the following
methods to send requests:

| Method |
|--------|
| `deletePaymentOrder`($paymentOrderUuid) : [PaymentOrderDeletionResponse](#PaymentOrderDeletionResponse)|
| `getPaymentOrder`($paymentOrderUuid) : [PaymentOrderRetrieval](#PaymentOrderRetrieval)|
| `getPaymentOrders`($page = null, $status = null, $sortBy = null, $pageSize = null, $sortOrder = null) : [PaymentOrderList](#PaymentOrderList)|
| `createPaymentOrder`(PaymentOrderCreation $createPaymentOrder) : [PaymentOrderCreationResponse](#PaymentOrderCreationResponse)|
| `clientCredentialsLogin`(ClientCredentials $clientCredentialsLogin) : [ClientCredentialsLoginResponse](#ClientCredentialsLoginResponse)|
| `getCallbacks`($paymentOrderUuid) : [CallbackList](#CallbackList)|
| `paymentReset`($paymentOrderUuid) : [PaymentOrderRetrieval](#PaymentOrderRetrieval)|
| `paymentUpdate`($paymentOrderUuid, PaymentUpdateObject $paymentUpdate) : [None](#None)|


## Objects

### PaymentOrderDeletionResponse

Payment order deletion response

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| cancel_url | _string_ | Yes | The URL where the user is redirected upon payment order expiration/cancellation |


### PaymentOrderRetrieval

Payment order retrieval data

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| redirect_url | _string_ | No | URL where to redirect the user to perform the payment |
| payment_data | _[PaymentData](#paymentdata)_ | Yes | Data needed to perform the checkout |
| created_at | _string_ | Yes | Creation date of the payment order |
| chargeback_date | _string_ | Yes | Time at which either the payment order has been fully paid or is expired |
| amount | _string_ | Yes | Fiat's amount of the payment order |
| resolved_at | _string_ | Yes | Time at which either the payment order has been fully paid or is expired |
| created_by | _[PaymentOrderCreator](#paymentordercreator)_ | Yes | Data of the pos which created the payment order |
| status | _string_ | Yes | Payment order's status |
| currency | _[CurrencyRetrieval](#currencyretrieval)_ | Yes | Fiat currency of the payment order |
| reference | _string_ | Yes | Business' reference for the payment order |
| callback_url | _string_ | No | The URL contacted to send callbacks related to payment status changes |
| dispute_start_date | _string_ | Yes | Time at which either the payment order has been fully paid or is expired |
| uuid | _string_ | Yes | UUID of the payment order |
| details | _string_ | No | Payment order's details |


### PaymentData

Data needed to perform the checkout

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| bitcoin | _[BitcoinPaymentData](#bitcoinpaymentdata)_ | No | Data for bitcoin payment checkout |
| expires_in | _integer_ | Yes | Expiration seconds of the payment order |
| ln | _[LnPaymentData](#lnpaymentdata)_ | No | Data for lightning network payment checkout |
| expiration_time | _string_ | Yes | Expiration date of the payment order |
| amount | _string_ | Yes | Amount related to the selected payment method (with rate conversion if any) |
| rate | _[RateRetrieval](#rateretrieval)_ | Yes | Payment order rate |
| payment_method | _string_ | Yes | Bound payment method |


### BitcoinPaymentData

Data needed to perform the checkout of a bitcoin-bound payment order

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| transactions | _\Illuminate\Support\Collection_ | Yes | Transactions paying the payment order |
| state | _[PaymentOrderState](#paymentorderstate)_ | Yes | Current payment state of the payment order |
| uri | _string_ | Yes | Bitcoin Uri |
| required_confirmations | _integer_ | Yes | Required confirmations for transactions paying the payment order |
| address | _string_ | Yes | Bitcoin address |


### Transaction

Bitcoin transaction paying a payment order

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| blockchain_status | _string_ | Yes | Transaction's internal status |
| status | _string_ | Yes | Transaction's status |
| created_at | _string_ | Yes |  |
| outs | _\Illuminate\Support\Collection_ | Yes | Transaction's outputs |
| normalized_txid | _string_ | Yes | Transaction's normalized id (DEPRECATED) |
| outs_sum | _integer_ | Yes | Paying amount of the transaction |
| txid | _string_ | Yes | Transaction's id |


### Out

Transaction's output

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| amount | _integer_ | Yes | Output's amount |
| n | _integer_ | Yes | Transaction output's index |


### PaymentOrderState

Data describing the current state of a payment order

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| blockchain_status | _string_ | Yes | Payment order's internal status |
| in_confirmation | _[PaidStatus](#paidstatus)_ | Yes | Payment order's paid but unconfirmed amount |
| paid | _[PaidStatus](#paidstatus)_ | Yes | Payment order's paid amount |
| unpaid | _[PaidStatus](#paidstatus)_ | Yes | Payment order's unpaid amount |


### PaidStatus

Cryto and fiat paid amounts

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| crypto | _integer_ | Yes | Cryto Amount |
| fiat | _string_ | Yes | Fiat Amount |


### LnPaymentData

Data needed to perform the checkout of a ln-bound payment order

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| invoice | _string_ | Yes | Ln bolt11 invoice |


### RateRetrieval

Rate Data

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| from | _string_ | No | Starting currency for rate calculation |
| to | _string_ | No | Target currency for rate calculation |
| source | _string_ | Yes | Exchange providing the rate |
| value | _string_ | Yes | Value of the rate |
| created_at | _string_ | Yes | Creation's date of the rate |


### PaymentOrderCreator

Data of payment order's creator

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| type | _string_ | Yes | Payment order creator's type |
| deposit_account | _[DepositAccountLite](#depositaccountlite)_ | Yes | Deposit account associated to the payment order's creator |
| active | _bool_ | No | Wheter the creator active |
| uuid | _string_ | Yes | Payment order creator's uuid |
| name | _string_ | Yes | Payment order creator's name |


### DepositAccountLite

Deposit account lite object when sent nested in other api objects

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| type | _string_ | Yes | Deposit account's type |
| uuid | _string_ | Yes | Deposit account's uuid |
| name | _string_ | Yes | Deposit account's name |


### CurrencyRetrieval

Currency Data

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| type | _string_ | Yes | Currency's type (fiat/crypto) |
| uuid | _string_ | Yes | UUID of the currency |
| name | _string_ | Yes | Name of the currency |


### PaymentOrderList

List of Business' payment orders

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| paymentorders | _\Illuminate\Support\Collection_ | Yes | Business' payment orders |
| total_pages | _integer_ | Yes | Total number of pages given the requested page size |
| total_items | _integer_ | Yes | Total number of items |


### PaymentOrderCreation

Data required to create a new payment order

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| callback_url | _string_ | No | The URL contacted to send callbacks related to payment status changes |
| reference | _string_ | No | Business' reference of the payment order |
| cancel_url | _string_ | No | The URL where the user is redirected upon successful payment order expiration/cancellation |
| required_confirmations | _integer_ | No | Required confirmations for transactions paying the payment order |
| amount | _string_ | Yes | Payment order's fiat amount |
| continue_url | _string_ | No | The URL where the user is redirected upon successful payment |
| details | _string_ | No | Payment order's details |


### PaymentOrderCreationResponse

Response data for a payment order creation request

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| redirect_url | _string_ | Yes | URL where to redirect the user to perform the payment |
| uuid | _string_ | Yes | UUID of the payment order |
| created_at | _string_ | No | Creation date of the payment order |
| reference | _string_ | No | Payment Order reference |


### ClientCredentials

Data required to perform a confidential client login

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| grant_type | _string_ | Yes | Oauth2 Authorization's grant type |
| scope | _string_ | Yes | Oauth2 scope of the client's authorization |


### ClientCredentialsLoginResponse

Response data for a login performed by a confidential client.

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| id_token | _string_ | Yes | Jwt Token containing identity's informations |
| scope | _string_ | No | Authorization's scope |
| token_type | _string_ | Yes | Token's type |
| expires_in | _integer_ | Yes | Token's expiration time |
| access_token | _string_ | Yes | User's access token |


### CallbackList

Callback list object

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| callbacks | _\Illuminate\Support\Collection_ | Yes | Valid payment transitions callbacks |


### Callback

Callback Retrieval object

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| name | _string_ | Yes | Namespace of a callback sent after the related payment status' transition |


### PaymentUpdateObject

Callback's trigger request body

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| callback | _string_ | Yes | Name of the callback to be sent |


### CallbackPaymentOrder

Payment order retrieval data

#### Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| uuid | _string_ | Yes | UUID of the payment order |




## Callbacks

Chainside will send callbacks if some event is triggered regarding one of your assets registered on the Business Panel.
Our server will send a request to your webhooks that you need to parse and verify. You can do this using this SDK library
in the following way:

```php
<?php

use Chainside\SDK\WebPos\ChainsideCallbacksHandler;

$config = [
    'mode' => 'live',
    'client_id' => 'CLIENT_ID',
    'secret' => 'SECRET'
];

$context = new ApiContext($config);
$handler = new ChainsideCallbacksHandler($context);

$headers = $request->getHeaders();
$body = $request->getRawBody();

$receivedCallback = $handler->parse($headers, $body);

```

The `ChainsideCallbacksHandler` will **verify** and **parse** the callback automatically from the incoming request.

If you are using Laravel you can use the facade to access the callback handler:

```php
<?php

$receivedCallback = \ChainsideWebPosCallbackHandler::parse($headers, $request);

// Or using the IoC
// $receivedCallback = app('chainside.sdk.webpos.callback.handler')->parse($headers, $request);

```

Alternatively you can use the `parseFromGlobals` method to automatically retrieve the request headers and
the raw body from the PHP HTTP global variables:

```php
<?php

$context = new ApiContext($config);
$handler = new ChainsideCallbacksHandler($context);

$receivedCallback = $handler->parseFromGlobals();

// Or, using Laravel

$receivedCallback = \ChainsideWebPosCallbackHandler::parseFromGlobals();

```

### Callback structure

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| object_type | _string_ | Yes | Type of the object sent in the callback |
| object | [CallbackPaymentOrder](#callbackpaymentorder) | Yes |  |
| created_at | _string_ | Yes | Date in which the callback was sent |
| event | _string_ | Yes | Event which triggered the callback |


### Triggered events

| Event | Object Class |
|------------|--------------|
| `payment.completed` | [CallbackPaymentOrder](#callbackpaymentorder) |
| `payment.dispute.start` | [CallbackPaymentOrder](#callbackpaymentorder) |
| `payment.overpaid` | [CallbackPaymentOrder](#callbackpaymentorder) |
| `payment.cancelled` | [CallbackPaymentOrder](#callbackpaymentorder) |
| `payment.dispute.end` | [CallbackPaymentOrder](#callbackpaymentorder) |
| `payment.expired` | [CallbackPaymentOrder](#callbackpaymentorder) |
| `payment.chargeback` | [CallbackPaymentOrder](#callbackpaymentorder) |


# Contributing

In order to maintain consistency between our backend and our SDKs, contributing through pull requests is highly
discouraged. Consider posting an issue if you need to signal any problem with this library.

# Security Issues

In case of a discovery of an actual or potential security issue please contact us at [info@chainside.net](mailto:info@chaniside.net)


