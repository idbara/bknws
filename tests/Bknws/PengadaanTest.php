<?php

namespace Bknws;

use Bknws\Exceptions\ApiException;

class PengadaanTest extends TestCase
{

    /**
     * @throws ApiException
     */
    public function testGetPengadaanInstansi()
    {
        $tahun = '2023';
        $data = Pengadaan::getPengadaanInstansi($tahun);
        $this->assertArrayHasKey('data', $data);
    }
}
