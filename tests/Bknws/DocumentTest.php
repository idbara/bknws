<?php

namespace Bknws;

use Bknws\Exceptions\ApiException;
use GuzzleHttp\Psr7\UploadedFile;

class DocumentTest extends TestCase
{
    private int $idRefDokumen = 872;

    /**
     * Post Document Test
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testPostDocument(): void
    {
        $params = [
            'file' => fopen(__DIR__.'/../download.pdf', 'r'),
            'id_ref_dokumen' => $this->idRefDokumen
        ];

        $data = Document::uploadDocument($params);
        fwrite(STDERR, print_r($data, true));
        $this->assertArrayHasKey('data', $data);
    }

    /**
     * Post Document Test with Oversize File >1Mb
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testPostDocumentOversize(): void
    {
        $params = [
            'file' => fopen(__DIR__.'/../oversize.pdf', 'r'),
            'id_ref_dokumen' => $this->idRefDokumen
        ];

        $data = Document::uploadDocument($params);
        fwrite(STDERR, print_r($data, true));
        $this->assertArrayHasKey('statusCode', $data);
    }

    /**
     * Get Document Test
     * Should pass
     *
     * @return void
     */
    public function testGetDocument(): void
    {

        $filePath = 'peremajaan/usulan/A8ACA7A4ECE03912E040640A040269BB_20230601_095156_test.pdf';

        $data = Document::downloadDocument($filePath, __DIR__.'/../download.pdf');
        fwrite(STDERR, print_r($data, true));
        $this->assertArrayHasKey('data', $data);
    }

    public function testGetFileName()
    {
        $filePath = 'peremajaan/usulan/A8ACA7A4ECE03912E040640A040269BB_20230601_095156_test.pdf';
        // get file name from path
        $fileName = basename($filePath);
        fwrite(STDERR, print_r($fileName, true));
        $this->assertIsString($fileName);
    }

}
