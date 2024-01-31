<?php

namespace Bknws;


use Bknws\ApiOperations\Request;
use Bknws\Exceptions\ApiException;

/**
 * Diklat.php
 *
 * @category   Class
 * @package    idbara\Bknws
 *
 */
class Diklat
{
    use Request;

    /**
     * Send Get request to get Diklat PNS
     *
     * @param string $id    Id Riwayat Diklat
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public static function getDiklat(string $id, array $params = []): array
    {
        $url = Bknws::$apiBase. '/diklat/id/' . $id;
        $result = static::_request('GET', $url, $params);
        return $result['body'];
    }


}
