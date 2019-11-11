<?php

namespace Chainside\SDK\WebPos\Actions;


use Chainside\SDK\WebPos\Exceptions\ChainsideSdkException;
use SDK\Boilerplate\Action;
use SDK\Boilerplate\Context;
use Chainside\SDK\WebPos\Exceptions\UnknownError;
use SDK\Boilerplate\Contracts\Response as IResponse;
use Chainside\SDK\WebPos\Exceptions\Factory\ChainsideExceptionFactory;

abstract class ChainsideAction extends Action
{

    protected $defaultHeaders = [
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'X-Api-Version' => 'v1'
    ];

    /**
     * ChainsideAction constructor.
     *
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    protected function getExceptionKey(IResponse $response)
    {

        if(!$this->hasResponse())
            throw new UnknownError('An unknown error occurred, could not get any response from server');

        $responseBody = $this->response->body();

        if(!array_key_exists('error_code', $responseBody)) {
            throw new UnknownError('An unknown error occurred: ' .
                PHP_EOL .
                'Response Body:' .
                PHP_EOL .
                json_encode($responseBody, JSON_PRETTY_PRINT));
        }

        return $responseBody['error_code'];

    }

    /**
     * @param string $errorCode
     * @return ChainsideSdkException
     */
    protected function getException($errorCode)
    {
        return ChainsideExceptionFactory::make($errorCode, $this->request, $this->response);
    }

}