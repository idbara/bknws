<?php

namespace Bknws\ApiOperations;

use Bknws\ApiRequestor;
use Bknws\Exceptions\ApiException;

trait Create
{
    /**
     * @throws ApiException
     */
    private static function _requestMultipart(string $string, $url, array $params): array
    {
        $requester = new ApiRequestor();
        return $requester->requestMultipart($string, $url, $params);

    }

    /**
     * Send a Create request to API
     *
     * @param array $params
     *
     * @return array
     */
    public function create(array $params = []): array
    {
        self::validateParams($params, static::createReqParams());

        $url = static::resourceUrl();

        return static::_request('POST', $url, $params);
    }

    /**
     * Create a resource using multipart/form-data.
     *
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public function createMultipart(array $params = []): array
    {
        self::validateParams($params, static::createReqParams());

        $url = static::resourceUrl();

        return static::_requestMultipart('POST', $url, $params);
    }


}
