<?php

namespace Bknws;

use Bknws\Exceptions\ApiException;
use Bknws\TestCase;

class KursusTest extends TestCase
{

    /**
     * Get Kursus by ID Riwayat Kursus Test
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetKursus()
    {
        $id = 'ff80808144245f070144296c81f03198';
        $data = Kursus::getKursus($id);
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Post Kursus Test
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testPostKursus()
    {
        $params = [
            "id" => "4d16dbbd-340a-11ee-96e3-0a580a830008",
            "institusiPenyelenggara" => "Test",
            "jenisDiklatId" => "4",
            "jenisKursus" => null,
            "jenisKursusSertipikat" => "Workshop",
            "jumlahJam"=> 12,
            "lokasiId" => null,
            "namaKursus" => "testing post",
            "nomorSertipikat" => "1/TEST/2023",
            "path" => [],
            "pnsOrangId" => "A8ACA7A4ECE03912E040640A040269BB",
            "tahunKursus" => 2024,
            "tanggalKursus" => "06-08-2023",
            "tanggalSelesaiKursus" => "06-08-2023",
        ];
        fwrite(STDOUT, print_r($params, true));
        $data = Kursus::saveKursus($params);
        fwrite(STDOUT, print_r($data, true));
        $this->assertArrayHasKey('mapData', $data);

    }
}
