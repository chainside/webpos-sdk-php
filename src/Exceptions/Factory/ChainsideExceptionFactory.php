<?php

namespace Chainside\SDK\WebPos\Exceptions\Factory;

use Illuminate\Support\Arr;
use SDK\Boilerplate\Contracts\Request;
use SDK\Boilerplate\Contracts\Response;
use Chainside\SDK\WebPos\Exceptions\ChainsideError;
use Chainside\SDK\WebPos\Exceptions\ChainsideSdkException;
use Chainside\SDK\WebPos\Exceptions\UnauthorizedClientException;
use Chainside\SDK\WebPos\Exceptions\InternalServerErrorException;
use Chainside\SDK\WebPos\Exceptions\InvalidCallbackException;
use Chainside\SDK\WebPos\Exceptions\InvalidScopeException;
use Chainside\SDK\WebPos\Exceptions\MethodNotAllowedException;
use Chainside\SDK\WebPos\Exceptions\FunctionalityDownException;
use Chainside\SDK\WebPos\Exceptions\InvalidRefreshTokenException;
use Chainside\SDK\WebPos\Exceptions\InvalidContentTypeHeaderException;
use Chainside\SDK\WebPos\Exceptions\TooManyRequestsException;
use Chainside\SDK\WebPos\Exceptions\InvalidGrantTypeException;
use Chainside\SDK\WebPos\Exceptions\NotFoundException;
use Chainside\SDK\WebPos\Exceptions\InvalidRealmException;
use Chainside\SDK\WebPos\Exceptions\RateUnavailableException;
use Chainside\SDK\WebPos\Exceptions\ValidationErrorException;
use Chainside\SDK\WebPos\Exceptions\InvalidAcceptHeaderException;
use Chainside\SDK\WebPos\Exceptions\ForbiddenException;
use Chainside\SDK\WebPos\Exceptions\InvalidAccessTokenException;
use Chainside\SDK\WebPos\Exceptions\InvalidAuthorizationHeaderException;
use Chainside\SDK\WebPos\Exceptions\AccessTokenExpiredException;


class ChainsideExceptionFactory
{

    const ERROR_MAPPING = [
        ChainsideError::UNAUTHORIZED_CLIENT_ERROR => UnauthorizedClientException::class,
        ChainsideError::INTERNAL_SERVER_ERROR => InternalServerErrorException::class,
        ChainsideError::INVALID_CALLBACK_ERROR => InvalidCallbackException::class,
        ChainsideError::INVALID_SCOPE_ERROR => InvalidScopeException::class,
        ChainsideError::METHOD_NOT_ALLOWED_ERROR => MethodNotAllowedException::class,
        ChainsideError::FUNCTIONALITY_DOWN_ERROR => FunctionalityDownException::class,
        ChainsideError::INVALID_REFRESH_TOKEN_ERROR => InvalidRefreshTokenException::class,
        ChainsideError::INVALID_CONTENT_TYPE_HEADER_ERROR => InvalidContentTypeHeaderException::class,
        ChainsideError::TOO_MANY_REQUESTS_ERROR => TooManyRequestsException::class,
        ChainsideError::INVALID_GRANT_TYPE_ERROR => InvalidGrantTypeException::class,
        ChainsideError::NOT_FOUND_ERROR => NotFoundException::class,
        ChainsideError::INVALID_REALM_ERROR => InvalidRealmException::class,
        ChainsideError::RATE_UNAVAILABLE_ERROR => RateUnavailableException::class,
        ChainsideError::VALIDATION_ERROR => ValidationErrorException::class,
        ChainsideError::INVALID_ACCEPT_HEADER_ERROR => InvalidAcceptHeaderException::class,
        ChainsideError::FORBIDDEN_ERROR => ForbiddenException::class,
        ChainsideError::INVALID_ACCESS_TOKEN_ERROR => InvalidAccessTokenException::class,
        ChainsideError::INVALID_AUTHORIZATION_HEADER_ERROR => InvalidAuthorizationHeaderException::class,
        ChainsideError::ACCESS_TOKEN_EXPIRED_ERROR => AccessTokenExpiredException::class,
        ];

    /**
     * Retruns an instance of the corresponding exception related to the received error code
     *
     * @param string $errorCode
     * @param Request $request
     * @param Response $response
     * @return ChainsideSdkException
     *
     */
    public static function make($errorCode, Request $request, Response $response)
    {

        if(!Arr::has(self::ERROR_MAPPING, $errorCode))
            return new ChainsideSdkException("[ERROR $errorCode] Unhandled error received from server", $errorCode);

        $exceptionClass = self::ERROR_MAPPING[$errorCode];
        return new $exceptionClass($request, $response);
    }

    /**
     * Raise an exception corresponding to the received error code
     *
     * @param string $errorCode
     * @param Request $request
     * @param Response $response
     * @throws ChainsideSdkException
     */
    public static function raise($errorCode, Request $request, Response $response)
    {

        throw self::make($errorCode, $request, $response);

    }

}