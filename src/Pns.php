<?php

/**
 * Pns.php
 *
 * @category   Class
 * @package    idbara\Bknws
 */

namespace Bknws;

use Bknws\Exceptions\ApiException;

class Pns
{
    use ApiOperations\Request;

    /**
     * Send Get request to get PNS Data Utama
     *
     * @param string $nip
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public static function getDataUtama(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/data-utama/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'message' => $e->getMessage()
            );
        }

    }

    /**
     * Send Get request to get Data Anak PNS
     *
     * @param string $nip
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public static function getDataAnak(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/data-anak/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body'],
            );
        } catch (ApiException $e) {
            fwrite(STDERR, print_r($e->getMessage(), TRUE));
            return array(
                'code' => 0,
                'message' => $e->getMessage()
            );
        }

    }

    /**
     * Send Get request to get Data Orang Tua PNS
     *
     * @param string $nip
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public static function getDataOrangTua(string $nip, array $params = []): array
    {
        $url = Bknws::$apiBase. '/pns/data-ortu/' . $nip;
        $result = static::_request('GET', $url, $params);
        return $result['body'];
    }

    /**
     * Send Get request to get Data Pasangan PNS
     *
     * @param string $nip
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public static function getDataPasangan(string $nip, array $params = []): array
    {
        $url = Bknws::$apiBase. '/pns/data-pasangan/' . $nip;
        $result = static::_request('GET', $url, $params);
        return $result['body'];
    }

}
