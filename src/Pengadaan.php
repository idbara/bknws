<?php

namespace Bknws;

use Bknws\Exceptions\ApiException;

class Pengadaan
{
    use ApiOperations\Request;

    /**
     * Send Get request to get Pengadaan by tahun
     *
     * @param string $tahun
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public static function getPengadaanInstansi(string $tahun, array $params = []): array
    {
        $url = Bknws::$apiBase. 'pengadaan/list-pengadaan-instansi?tahun=' . $tahun;
        $result = static::_request('GET', $url, $params);
        return $result['body'];
    }
}