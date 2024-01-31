<?php

namespace Bknws;


use Bknws\ApiOperations\Request;
use Bknws\Exceptions\ApiException;

/**
 * Jabatan.php
 *
 * @category   Class
 * @package    idbara\Bknws
 *
 */
class Jabatan
{
    use Request;

    /**
     * Send Get request to get Jabatan PNS
     *
     * @param string $nip
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public static function getJabatanPNS(string $nip, array $params = []): array
    {
        $url = Bknws::$apiBase. '/jabatan/pns/' . $nip;
        $result = static::_request('GET', $url, $params);
        return $result['body'];
    }

    /**
     * Send Get request to get Jabatan by ID
     *
     * @param string $id
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public static function getJabatan(string $id, array $params = []): array
    {
        $url = Bknws::$apiBase. '/jabatan/id/' . $id;
        $result = static::_request('GET', $url, $params);
        return $result['body'];
    }

    /**
     * Send Post request to save Jabatan
     *
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public static function saveJabatan(array $params = []): array
    {
        $url = Bknws::$apiBase. '/jabatan/save';
        $result = static::_request('POST', $url, $params);
        return $result['body'];
    }

}
