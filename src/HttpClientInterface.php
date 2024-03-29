<?php

/**
 * HttpClientInterface.php
 *
 * @category    class
 * @package     Bknws
 */

namespace Bknws;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

/**
 * Interface HttpClientInterface
 */

interface HttpClientInterface
{
    /**
     * Create and send an HTTP request.
     *
     * Use an absolute path to override the base path of the client, or a
     * relative path to append to the base path of the client. The URL can
     * contain the query string as well.
     *
     * @param string              $method  HTTP method.
     * @param string|UriInterface $uri     URI object or string.
     * @param array               $options Request options to apply.
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function request(string $method, string|UriInterface $uri, array $options = []): ResponseInterface;
}
