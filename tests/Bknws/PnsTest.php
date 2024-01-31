<?php

namespace Bknws;

use Bknws\Exceptions\ApiException;
use Bknws\Pns;
use Bknws\TestCase;

class PnsTest extends TestCase
{
    private string $nip = '198110182010011015';

    /**
     * Get PNS Data Utama Test
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetDataUtama()
    {
        $data = Pns::getDataUtama($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get PNS Data Utama Test with Not Found NIP
     * Should pass
     * @return void
     * @throws ApiException
     */
    public function testGetDataUtamaDataNotFound()
    {
        $data = Pns::getDataUtama('199408192018081001');
        $this->assertArrayHasKey('data', $data);
        $this->assertEquals('Data tidak ditemukan', $data['data']);
    }

    /**
     * Get Data Anak Pns Test
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetDataAnak()
    {
        $data = Pns::getDataAnak($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Data Orang Tua Pns Test
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetDataOrangTua()
    {
        $data = Pns::getDataOrangTua($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Data Pasangan Pns Test
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetDataPasangan()
    {
        $data = Pns::getDataPasangan($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

}
