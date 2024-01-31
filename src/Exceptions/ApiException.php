<?php

namespace Bknws\Exceptions;

class ApiException extends \Exception implements ExceptionInterface
{

    protected $errorCode;

    /**
     * Get Error Code for Exception instance
     *
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    /**
     * Create a new instance of ApiException
     *
     * @param string $message
     * @param string $code
     * @param string $errorCode
     * @throws ApiException
     */
    public function __construct(string $message, $code, $errorCode)
    {
        if (!$message) {
            throw new $this('Unknown '. get_class($this));
        }
        parent::__construct($message, $code);
        $this->errorCode = $errorCode;
    }
}
