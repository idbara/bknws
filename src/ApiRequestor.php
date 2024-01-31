<?php

/**
 * Class Apirequestor
 *
 * @category class
 * @package Bknws
 */

namespace Bknws;

use Bknws\Exceptions\ApiException;
use Bknws\HttpClient\GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;

class ApiRequestor
{
    private static $_httpClient;



    /**
     * Send request and process response
     *
     * @param string $method
     * @param string $url
     * @param array $params
     * @param array $headers
     *
     * @return array
     * @throws ApiException
     */
    public function request(string $method, string $url, array $params = [], array $headers = []): array
    {
        return self::_requestRaw($method, $url, $params, $headers);

    }

    /**
     * Send request and process response multipart form data
     *
     * @param string $method
     * @param string $url
     * @param array $params
     * @param array $headers
     *
     * @return array
     * @throws ApiException
     */
    public function requestMultipart(string $method, string $url, array $params = [], array $headers = []): array
    {
        return self::_requestMultipart($method, $url, $params, $headers);
    }

    /**
     * Send Request to download file from API
     *
     * @param string $url
     * @param array $params
     * @param array $headers
     *
     * @return array
     * @throws ApiException
     */
    public function requestDownload(string $url, array $params = [], array $headers = []): array
    {
        try {
            return self::_requestDownload($url, $params, $headers);
        } catch (ApiException|GuzzleException $e) {
            throw new ApiException($e->getMessage(), $e->getCode(), $e->getCode());
        }
    }

    /**
     * Set must have headers
     *
     * @param array $headers
     *
     * @return array
     */
    private static function _setDefaultHeaders(array $headers = []): array
    {
        // get token sso from Bknws class static variable $tokenSSO
        $tokenSSO = Bknws::$tokenSSO['access_token'];
        $tokenAPI = Bknws::$tokenAPI['access_token'];

        $defaultHeaders = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Auth' => 'Bearer ' . $tokenSSO,
            'Authorization' => 'Bearer ' . $tokenAPI,
        ];

        return array_merge($defaultHeaders, $headers);
    }

    /**
     * Send request from client
     *
     * @param string $method
     * @param string $url
     * @param array $params
     * @param array $headers
     *
     * @return array
     * @throws ApiException
     */
    private function _requestRaw(string $method, string $url, array $params = [], array $headers = []): array
    {
        $defaultHeaders = self::_setDefaultHeaders($headers);

        return self::_httpClient()->sendRequest($method, $url, $defaultHeaders, $params);
    }

    /**
     * Send request from client multipart form data
     *
     * @param string $method
     * @param string $url
     * @param array $params
     * @param array $headers
     *
     * @return array
     * @throws ApiException
     */
    private static function _requestMultipart(string $method, string $url, array $params, array $headers): array
    {
        $tokenSSO = Bknws::$tokenSSO['access_token'];
        $tokenAPI = Bknws::$tokenAPI['access_token'];
        $defaultHeaders = [
            'Auth' => 'Bearer ' . $tokenSSO,
            'Authorization' => 'Bearer ' . $tokenAPI,
        ];

        return self::_httpClient()->sendRequestMultipart($method, $url, $defaultHeaders, $params);
    }

    /**
     * @throws ApiException
     * @throws GuzzleException
     */
    private static function _requestDownload(string $url, array $params, array $headers): array
    {
        $defaultHeaders = self::_setDefaultHeaders($headers);
        return self::_httpClient()->sendRequestDokumen($url, $params, $defaultHeaders);
    }

    /**
     * Create HTTP Client
     *
     * @return GuzzleClient
     */
    public static function _httpClient(): GuzzleClient
    {
        if (!self::$_httpClient) {
            self::$_httpClient = GuzzleClient::instance();
        }
        return self::$_httpClient;
    }

    /**
     * GuzzleClient Setter
     *
     * @param GuzzleClient $client
     *
     * @return void
     */
    public static function setHttpClient(GuzzleClient $client): void
    {
        self::$_httpClient = $client;
    }
}
