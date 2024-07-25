<?php

namespace Bknws\ApiOperations;

trait ResponseHandler
{
    public static function handle($response): array
    {
        $body = $response['body'];
        $statusCode = $response['statusCode'];
        $headers = $response['headers'];
        return [
            'statusCode' => $statusCode,
            'body' => $body,
        ];
    }

    /**
     * Handles a successful API response.
     *
     * @param array $response The API response as a JSON string.
     * @return mixed The decoded response data.
     * @throws \Exception If the response cannot be decoded or processed.
     */
    public static function handleSuccess($response): array
    {
        $body = $response['body'];
        $statusCode = $response['statusCode'];
        $headers = $response['headers'];
        return $body;
    }


    public static function handleError($response): array
    {
        $message = $response->getErrorMessage();
        $json = explode('response:', $message);

        return [
            'statusCode' => $response->getErrorCode(),
            'message' => $message,
            'body' => $json[1],
        ];


    }
    

}
