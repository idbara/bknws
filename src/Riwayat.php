<?php

namespace Bknws;

use Bknws\ApiOperations\Request;
use Bknws\Exceptions\ApiException;

/**
 * Riwayat.php
 *
 * @category   Class
 * @package    idbara\Bknws
 *
 */
class Riwayat
{
    use Request;

    /**
     * Send Get request to get Riwayat Angka Kredit
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getAngkaKredit(string $nip, array $params = []): array
    {
        try{
            $url = Bknws::$apiBase. '/pns/rw-angkakredit/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }

    }

    /**
     * Send Get request to get Riwayat Cltn PNS
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getCltn(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-cltn/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get Riwayat Diklat Struktural
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getDiklat(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-diklat/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get Riwayat Dp3
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getDp3(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-dp3/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get RW Golongan
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getGolongan(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-golongan/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get RW Hukuman Disiplin
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getHukdis(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-hukdis/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get RW Jabatan
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getJabatan(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-jabatan/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }



    /**
     * Send Get request to get RW Kursus
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getKursus(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-kursus/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get RW Masa Kerja
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getMasaKerja(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-masakerja/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get RW Pemberhentian
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getPemberhentian(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-pemberhentian/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get RW Pendidikan
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getPendidikan(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-pendidikan/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get RW Penghargaan
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getPenghargaan(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-penghargaan/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get RW Pindah Instansi
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getPindahInstansi(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-pindahinstansi/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get RW PNS Unor
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getPnsUnor(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-pnsunor/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get RW PWK
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getPwk(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-pwk/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get RW SKP
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getSkp(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-skp/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data'],
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }

    /**
     * Send Get request to get RW SKP 22
     *
     * @param string $nip
     * @param array $params
     * @return array
     */
    public static function getSkp22(string $nip, array $params = []): array
    {
        try {
            $url = Bknws::$apiBase. '/pns/rw-skp22/' . $nip;
            $result = static::_request('GET', $url, $params);
            return array(
                'code' => 1,
                'data' => $result['body']['data']
            );
        } catch (ApiException $e) {
            return array(
                'code' => 0,
                'data' => $e->getMessage()
            );
        }
    }
}
