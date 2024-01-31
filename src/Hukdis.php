<?php

namespace Bknws;

use Bknws\ApiOperations\Request;
use Bknws\Exceptions\ApiException;

/**
 * Hukdis.php
 *
 * @category   Class
 * @package    idbara\Bknws
 */
class Hukdis
{
    use Request;

    /**
     * Send Get request to get Hukdis PNS by ID
     *
     * @param string $id Id Riwayat Hukdis
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public static function getHukdis(string $id, array $params = []): array
    {
        $url = Bknws::$apiBase. '/hukdis/id/' . $id;
        $result = static::_request('GET', $url, $params);
        return $result['body'];
    }

}
