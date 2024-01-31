<?php

namespace Bknws\ApiOperations;

use Bknws\ApiRequestor;
use Bknws\Exceptions\ApiException;

trait Retrieve
{
    /**
     * Send Get request to retrieve pdf
     *
     * @param string $url
     * @param array $params
     *
     * @return array
     */
    public static function _retrieveDocument(string $url, array $params = []): array
    {
        $requester = new ApiRequestor();
        return $requester->requestDownload($url, $params);

    }


}
