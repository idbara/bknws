<?php

namespace Bknws\HttpClient;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Interface ClientInterface
 *
 * @category    Interface
 * @package     Bknws\HttpClient
 */
interface ClientInterface
{
    /**
     * @param string $method
     * @param string $url
     * @param array $defaultHeaders
     * @param array $params
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function sendRequest(string $method, string $url, array $defaultHeaders = [], array $params = []);
}
