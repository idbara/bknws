<?php

namespace Bknws;

use Bknws\ApiOperations\Request;
use Bknws\Exceptions\ApiException;

/**
 * Kursus.php
 *
 * @category   Class
 * @package    idbara\Bknws
 */
class Kursus
{
    use Request;

    /**
     * Send Get request to get Kursus PNS
     *
     * @param string $id    Id Riwayat Kursus
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public static function getKursus(string $id, array $params = []): array
    {
        $url = Bknws::$apiBase. '/kursus/id/' . $id;
        $result = static::_request('GET', $url, $params);
        return $result['body'];
    }

    /**
     * Send Post request to save Kursus
     *
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public static function saveKursus(array $params = []): array
    {
        $url = Bknws::$apiBase. '/kursus/save';
        $result = static::_request('POST', $url, $params);
        return $result['body'];
    }

}
