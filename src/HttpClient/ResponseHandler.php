<?php

namespace Bknws\HttpClient;

use Psr\Http\Message\ResponseInterface;

class ResponseHandler implements ResponseHandlerInterface
{
    /**
     * Handle the API response.
     *
     * @param ResponseInterface $response
     * @return array
     */
    public function handle( $response): array
    {
        $getBody = $response->getBody()->getContents();
        $body = json_decode($getBody, true);
        $statusCode = $response->getStatusCode();
        $headers = $response->getHeaders();
        $getMessages = $response->getReasonPhrase();
        $messages = [
            'status_code' => $statusCode,
            'data' => $getMessages,
        ];

        return [
            'body' => $body ?? $messages,
            'statusCode' => $statusCode,
            'headers' => $headers,
        ];
    }

    /**
     * Handle the API response 404 Not Found.
     *
     * @param array $message
     * @param ResponseInterface $response
     * @return array
     */
    public function handleError(array|string $message, $response): array
    {
        $statusCode = $response->getStatusCode();
        $headers = $response->getHeaders();
        return [
            'body' => $message,
            'statusCode' => $statusCode,
            'headers' => $headers,
        ];
    }

}
