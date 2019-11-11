<?php

namespace Chainside\SDK\WebPos;

use SDK\Boilerplate\Callbacks\CallbacksHandler;
use Chainside\SDK\WebPos\Exceptions\CallbackParseException;
use Chainside\SDK\WebPos\Exceptions\UnknownCallbackException;
use Chainside\SDK\WebPos\Objects\PaymentOverpaidCallback;
use Chainside\SDK\WebPos\Objects\PaymentCompletedCallback;
use Chainside\SDK\WebPos\Objects\PaymentDisputeStartCallback;
use Chainside\SDK\WebPos\Objects\PaymentChargebackCallback;
use Chainside\SDK\WebPos\Objects\PaymentCancelledCallback;
use Chainside\SDK\WebPos\Objects\PaymentDisputeEndCallback;
use Chainside\SDK\WebPos\Objects\PaymentExpiredCallback;


class ChainsideCallbacksHandler extends CallbacksHandler
{

    protected $callbacks = [
        'payment.overpaid' => PaymentOverpaidCallback::class,
        'payment.completed' => PaymentCompletedCallback::class,
        'payment.dispute.start' => PaymentDisputeStartCallback::class,
        'payment.chargeback' => PaymentChargebackCallback::class,
        'payment.cancelled' => PaymentCancelledCallback::class,
        'payment.dispute.end' => PaymentDisputeEndCallback::class,
        'payment.expired' => PaymentExpiredCallback::class,
        ];

    /**
     * @inheritdoc
     *
     * @return string
     *
     * @throws CallbackParseException
     * @throws UnknownCallbackException
     */
    protected function getCallbackNamespace(array $headers, $body)
    {

        $body = $this->parseBody($headers, $body);

        if(!isset($body['event']))
            throw new CallbackParseException('Could not find event type in body: ' . PHP_EOL . json_encode($body, JSON_PRETTY_PRINT));

        if(!array_key_exists('event', $body))
            throw new UnknownCallbackException('Unknown callback ' . $body['event'] . ' received');

        return $body['event'];

    }

    /**
     * @inheritdoc
     */
    protected function verify(array $headers, $body)
    {

        if(!array_key_exists('chainside-signature', $headers)) return false;
        $signature = $headers['chainside-signature'];

        $key = hash('sha256', $this->context->getConfig()->get('secret'), true);
        $digest = base64_encode(hash_hmac('sha512', $body, $key, true));

        return hash_equals($signature, $digest);

    }

}