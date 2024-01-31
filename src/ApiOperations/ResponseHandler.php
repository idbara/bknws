<?php

namespace idbara\bknws\ApiOperations;

trait ResponseHandler
{
    public static function handle($response): array
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

}
