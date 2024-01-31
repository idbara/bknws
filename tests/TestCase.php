<?php

namespace Bknws;

use Bknws\Exceptions\ApiException;
use Bknws\HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Utils;


class TestCase extends \PHPUnit\Framework\TestCase
{
    private $bkn;
    private string $sso_client_id = '';
    private string $sso_username = '';
    private string $sso_password = '';
    private string $consumer_key = '';
    private string $consumer_secret = '';


    /**
     * @throws GuzzleException
     */
    public function setUp(): void
    {
        $this->bkn = new Bknws($this->sso_client_id, $this->sso_username, $this->sso_password, $this->consumer_key, $this->consumer_secret);
        $guzzleClient = HttpClient\GuzzleClient::instance();
        ApiRequestor::setHttpClient($guzzleClient);
    }

    /**
     * @throws GuzzleException
     */
    public function testGetTokenSSO()
    {
        $token = $this->bkn->getTokenSSO();
        $this->assertArrayHasKey('access_token', $token);
    }

    /**
     * @throws GuzzleException
     */
    public function testGetTokenApi()
    {
        $token = $this->bkn->getTokenApi();
        $this->assertArrayHasKey('access_token', $token);
    }

    public function testGuzzleClient()
    {
        $guzzleClient = HttpClient\GuzzleClient::instance();
        $method = 'GET';
        $url = 'https://apimws.bkn.go.id:8243/apisiasn/1.0/pns/data-utama/198110182010011015';
        $headers = [
            'Auth' => 'Bearer ' . $this->bkn->getAccessTokenSSO(),
            'Authorization' => 'Bearer ' . $this->bkn->getAccessTokenApi(),
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        try {
            $response = $guzzleClient->sendRequest($method, $url, $headers);

            $this->assertIsArray($response);
            $this->assertArrayHasKey('data', $response['body']);

            // Assert that the status code is 200
            $this->assertEquals(200, $response['statusCode']);
        } catch (GuzzleException $e) {
            $this->fail($e->getMessage());
        } catch (ApiException $e) {
            $this->fail($e->getMessage());
        }
    }

    /**
     * Test GuzzleClient post pdf file
     * Should pass
     *
     * @return void
     */
    public function testGuzzleClientPostPdf()
    {
        $guzzleClient = HttpClient\GuzzleClient::instance();
        $method = 'POST';
        $url = 'https://apimws.bkn.go.id:8243/apisiasn/1.0/upload-dok';
        $headers = [
            'Auth' => 'Bearer ' . $this->bkn->getAccessTokenSSO(),
            'Authorization' => 'Bearer ' . $this->bkn->getAccessTokenApi(),
        ];
        try {
            $params = [
                'file' => fopen(__DIR__.'/../tests/test.pdf', 'r'),
                'id_ref_dokumen' => 872,
            ];

            $response = $guzzleClient->sendRequestMultipart($method, $url, $headers, $params);

            $this->assertIsArray($response);
            $this->assertArrayHasKey('data', $response['body']);

        } catch (GuzzleException $e) {
            $this->fail($e->getMessage());
        } catch (ApiException $e) {
            $this->fail($e->getMessage());
        }
    }

    /**
     * Test GuzzleClient get pdf file
     * Should pass
     *
     * @return void
     * @throws ApiException
     * @throws GuzzleException
     */
    public function testGuzzleClientGetPdf()
    {
        $guzzleClient = HttpClient\GuzzleClient::instance();
        $method = 'GET';
        $url = 'https://apimws.bkn.go.id:8243/apisiasn/1.0/download-dok?filePath=peremajaan/usulan/A8ACA7A4ECE03912E040640A040269BB_20230601_095949_contoh.pdf';
        $headers = [
            'Auth' => 'Bearer ' . $this->bkn->getAccessTokenSSO(),
            'Authorization' => 'Bearer ' . $this->bkn->getAccessTokenApi(),
        ];

            $params = [
                'filePath' => 'peremajaan/usulan/A8ACA7A4ECE03912E040640A040269BB_20230601_095949_contoh.pdf',
                'savePath' => __DIR__.'/download.pdf'
            ];

            $response = $guzzleClient->sendRequestDokumen($url, $params, $headers);
            fwrite(STDERR, print_r($response, TRUE));

            // Assert that the status code is 200
            $this->assertIsArray($response);
    }
}
