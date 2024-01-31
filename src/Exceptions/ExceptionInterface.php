<?php


/**
 * Interface ExceptionInterface
 *
 * @category    Interface
 * @package     Bknws
 */

namespace Bknws\Exceptions;

/**
 * Interface ExceptionInterface
 *
 * @category    Interface
 * @package     Bknws\Exceptions
 */
interface ExceptionInterface
{
    /**
     * Get error code for exception instance
     *
     * @return string
     */
    public function getErrorCode(): string;
}
