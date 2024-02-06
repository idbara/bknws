<?php

namespace Bknws\HttpClient;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Bknws\Bknws;
use Bknws\Exceptions\ApiException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

class GuzzleClient implements ClientInterface
{

    private static $_instance;
    protected Guzzle $http;
    protected ?ResponseHandlerInterface $responseHandler = null;

    /**
     * Bknws Client constructor.
     */
    public function __construct()
    {
        $this->http = new Guzzle([
            'base_uri' => Bknws::$apiBase,
            'timeout' => 60,
            'verify' => false,
        ]);
        // set response handler
        $this->setResponseHandler(new ResponseHandler());
    }

    /**
     * Set the response handler.
     *
     * @param ResponseHandlerInterface $responseHandler
     * @return void
     */
    public function setResponseHandler(ResponseHandlerInterface $responseHandler): void
    {
        $this->responseHandler = $responseHandler;
    }

    /**
     * Create Client instance
     *
     * @return GuzzleClient
     */
    public static function instance(): GuzzleClient
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Create a request to execute in _executeRequest
     *
     * @param string $method         request method
     * @param string $url            url
     * @param array  $defaultHeaders request headers
     * @param array  $params         parameters
     *
     * @return array
     * @throws ApiException
     */
    public function sendRequest(string $method, string $url, array $defaultHeaders = [], array $params = []): array
    {
        $method = strtoupper($method);
        $options = [];
        $options['headers'] = $defaultHeaders;
        $options['method'] = $method;
        $options['params'] = $params;

        if (!empty($params)) {
            $isQueryParam = isset($params['query-param']) && $params['query-param'] == true;
            if ($isQueryParam) {
                unset($params['query-param']);
                $options[RequestOptions::QUERY] = $params;
            } else {
                $options[RequestOptions::JSON] = $params;
            }
        }

        return $this->_executeRequest($method, $url, $options);
    }

    /**
     * Create a request multipart to execute in _executeRequest
     *
     * @param string $method         request method
     * @param string $url            url
     * @param array  $defaultHeaders request headers
     * @param array  $params         parameters
     *
     * @return array
     * @throws ApiException
     */
    public function sendRequestMultipart(string $method, string $url, array $defaultHeaders = [], array $params = []): array
    {
        $method = strtoupper($method);
        $options = [];
        $options['headers'] = $defaultHeaders;
        $options['method'] = $method;
        $options['multipart'] = $this->buildMultipartData($params);

        return $this->_executeRequest($method, $url, $options);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     * @return array
     * @throws ApiException
     */
    public function _executeRequest(string $method, string $url, array $options): array
    {
        try {
            $response = $this->http->request($method, $url, $options);
            return $this->responseHandler->handle($response);
        } catch (RequestException $e) {
            $code = $e->getCode();
            $response = $e->getResponse();
            $body = $response->getBody()->getContents();
//            if ($body) {
//                $body = json_decode($body, true);
//                $message = $body['message'] ?? $e->getMessage();
//                return $this->responseHandler->handleError($message, $response);
//            }
            if($code == 404){
                $message = $body['data'] ?? array('data'=>'Data tidak ditemukan');
                return $this->responseHandler->handleError($message, $response);
            }
            throw new ApiException($e->getMessage(), $e->getCode(), $e->getPrevious(), $response);
        } catch (GuzzleException $e) {
            throw new ApiException($e->getMessage(), $e->getCode(), $e->getPrevious());
        }
    }

    /**
     * Build the multipart data array.
     *
     * @param array $data Multipart data
     *
     * @return array
     */
    private function buildMultipartData(array $data): array
    {
        $multipart = [];
        foreach ($data as $key => $value) {
            $multipart[] = [
                'name' => $key,
                'contents' => $value,
            ];
        }
        return $multipart;

    }

    /**
     * Get Dokumen Pdf
     *
     * @param string $url url
     * @param array $params parameters
     * @param array $headers headers
     *
     * @return array
     * @throws ApiException
     * @throws GuzzleException
     */
    public function sendRequestDokumen(string $url, array $params = [], array $headers = [])
    {
        $defaultHeaders = [
            'Content-Type' => 'application/pdf',
        ];
        $savePath = $params['savePath'];
//        $filePath = $params['filePath'];
        $options = [];
        $options['headers'] = array_merge($defaultHeaders, $headers);
        $options['method'] = 'GET';
        $options['sink'] = $savePath;

        $response = $this->http->request('GET', $url, $options);
//        \Log::info($response->getStatusCode());
        // Save the response content (PDF) to a file
        $body = $response->getBody()->getContents();

        $pathToFile = file_put_contents($savePath, $body);
//        return [
//            'status' => true,
//            'message' => 'Success',
//            'data' => [
//                'file_path' => $savePath,
//            ],
//        ];
        // return pdf file to load in browser
//        return response()->file($pathToFile);
        return array(
            'status' => true,
            'message' => 'Success',
            'data' => [
                'file_path' => $savePath,
            ],
        );
    }


}
