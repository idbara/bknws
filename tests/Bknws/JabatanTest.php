<?php

namespace Bknws;

use Bknws\Exceptions\ApiException;
use Bknws\TestCase;

class JabatanTest extends TestCase
{
    private string $nip = '198110182010011015';
    private string $id = 'ff80808144245f070144296c81f03198';
    private int $idRefDokumen = 872;

    /**
     * Get Jabatan PNS Test
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetJabatanPNS()
    {
        $data = Jabatan::getJabatanPNS($this->nip);
        fwrite(STDERR, print_r($data, TRUE));
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Get Jabatan ID Test
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetJabatan()
    {
        $data = Jabatan::getJabatan($this->id);
        fwrite(STDERR, print_r($data, TRUE));
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Save Jabatan Test
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testSaveJabatan()
    {
        $path = [
            'dok_id' => '872',
            'dok_nama' => 'Dok SK Jabatan',
            'dok_uri' => 'peremajaan/usulan/A8ACA7A4ECE03912E040640A040269BB_20230725_225655_download.pdf',
            'object' => 'peremajaan/usulan/A8ACA7A4ECE03912E040640A040269BB_20230725_225655_download.pdf',
            'slug' => '872'
        ];
        $params = [
            'eselonId' => null,
            'id' => 'ff80808144245f070144296c81f03198',
            'instansiId' => 'A5EB03E23BA8F6A0E040640A040252AD',
            'jabatanFungsionalId' => '',
            'jabatanFungsionalUmumId' => 'A418D76E027CB891E040640A04021940',
            'jenisJabatan' => '4',
            'nomorSk' => '821.2/130/TEST1/2015',
            'path' => array($path),
            'pnsId' => 'A8ACA7A4ECE03912E040640A040269BB',
            'satuanKerjaId' => 'A5EB03E241FAF6A0E040640A040252AD',
            'tanggalSk' => '',
            'tmtJabatan' => '01-04-2014',
            'tmtPelantikan' => '',
            'unorId' => 'A8ACA73E59FB3912E040640A040269BB',
        ];
        fwrite(STDOUT, print_r($params, true));
        $data = Jabatan::saveJabatan($params);
        fwrite(STDERR, print_r($data, TRUE));
        $this->assertArrayHasKey('success', $data);
        $this->assertTrue($data['success']);
    }

    /**
     * @throws ApiException
     */
    public function testSaveJabatanWithUploadDok()
    {
        $dokParams = [
            'file' => fopen(__DIR__.'/../download.pdf', 'r'),
            'id_ref_dokumen' => $this->idRefDokumen
        ];

        $resultDok = Document::uploadDocument($dokParams);
        fwrite(STDOUT, print_r($resultDok, true));
        $this->assertArrayHasKey('data', $resultDok);
        //get type of data
        fwrite(STDOUT, print_r(gettype($resultDok['data']), true));
        $path = $resultDok['data'];
        fwrite(STDOUT, print_r($path, true));
        $params = [
            'eselonId' => null,
            'id' => 'ff80808144245f070144296c81f03198',
            'instansiId' => 'A5EB03E23BA8F6A0E040640A040252AD',
            'jabatanFungsionalId' => '',
            'jabatanFungsionalUmumId' => 'A418D76E027CB891E040640A04021940',
            'jenisJabatan' => '4',
            'nomorSk' => '821.2/130/TESTPack/2015',
            'path' => array($path),
            'pnsId' => 'A8ACA7A4ECE03912E040640A040269BB',
            'satuanKerjaId' => 'A5EB03E241FAF6A0E040640A040252AD',
            'tanggalSk' => '',
            'tmtJabatan' => '01-04-2014',
            'tmtPelantikan' => '',
            'unorId' => 'A8ACA73E59FB3912E040640A040269BB',
        ];

        fwrite(STDOUT, print_r($params, true));

        $resultJab = Jabatan::saveJabatan($params);
        fwrite(STDOUT, print_r($resultJab, true));
        $this->assertArrayHasKey('success', $resultJab);

    }
}
