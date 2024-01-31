<?php

namespace Bknws;

use Bknws\Exceptions\ApiException;

class RiwayatTest extends TestCase
{
    private string $nip = '198110182010011015';

    /**
     * Get Riwayat SKP
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetSkp()
    {
        $data = Riwayat::getSkp($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat Kursus
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetKursus()
    {
        $data = Riwayat::getKursus($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat PNS Unor
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetPnsUnor()
    {
        $data = Riwayat::getPnsUnor($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat DP3
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetDp3()
    {
        $data = Riwayat::getDp3($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat Angka Kredit
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetAngkaKredit()
    {
        $data = Riwayat::getAngkaKredit($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat Pindah Instansi
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetPindahInstansi()
    {
        $data = Riwayat::getPindahInstansi($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat SKP 22
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetSkp22()
    {
        $data = Riwayat::getSkp22($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat PWK
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetPwk()
    {
        $data = Riwayat::getPwk($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat Masa Kerja
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetMasaKerja()
    {
        $data = Riwayat::getMasaKerja($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat Cltn
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetCltn()
    {
        $data = Riwayat::getCltn($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat Diklat
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetDiklat()
    {
        $data = Riwayat::getDiklat($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat Hukdis
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetHukdis()
    {
        $data = Riwayat::getHukdis($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat Jabatan
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetJabatan()
    {
        $data = Riwayat::getJabatan($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat Penghargaan
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetPenghargaan()
    {
        $data = Riwayat::getPenghargaan($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat Pemberhentian
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetPemberhentian()
    {
        $data = Riwayat::getPemberhentian($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat Pendidikan
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetPendidikan()
    {
        $data = Riwayat::getPendidikan($this->nip);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Riwayat Golongan
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetGolongan()
    {
        $data = Riwayat::getGolongan($this->nip);
        $this->assertArrayHasKey('data', $data);
    }
}
