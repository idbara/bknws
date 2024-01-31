<?php

namespace Bknws\HttpClient;

use Psr\Http\Message\ResponseInterface;

interface ResponseHandlerInterface
{
    /**
     * Handle the API response.
     *
     * @param ResponseInterface $response
     * @return array
     */
    public function handle(ResponseInterface $response): array;

}
