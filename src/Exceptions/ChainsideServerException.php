<?php

namespace Chainside\SDK\WebPos\Exceptions;


use Illuminate\Support\Arr;
use SDK\Boilerplate\Contracts\Request;
use SDK\Boilerplate\Contracts\Response;
use Chainside\SDK\WebPos\Exceptions\ServerError as ServerErrorInterface;

abstract class ChainsideServerException extends ChainsideSdkException implements ServerErrorInterface
{


    protected $responseMessage;
    protected $request;
    protected $response;

    /**
     * @var string | null
     */
    protected $requestId;

    public function __construct(Request $request, Response $response)
    {

        $this->request = $request;
        $this->response = $response;

        if(isset($this->response->body()['request_id'])) {
            $this->requestId  = $this->response->body()['request_id'];
        }

        parent::__construct($this->exceptionMessage(), intval(static::errorCode()));
    }

    protected function exceptionMessage()
    {

        $responseMessage = Arr::get($this->response->body(), 'message', '');
        $exceptionMessage = '[' . static::errorCode() . ' ' . static::errorDescription() . ']'
            . ($responseMessage ? ' ' . $responseMessage : '') ;

        return $exceptionMessage;
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function setResponse(Response $response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getRequestId() {
        return $this->requestId;
    }


}