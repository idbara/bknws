<?php
namespace Bknws;

use Bknws\HttpClient\GuzzleClient;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Bknws
{
    public static array $tokenSSO;
    public static array $tokenAPI;
    public static Client $_httpClient;
    public static string $sso_client_id;
    public static string $sso_grant_type;
    public static string $sso_username;
    public static string $sso_password;
    public static string $sso_url = 'https://sso-siasn.bkn.go.id/auth/realms/public-siasn/protocol/openid-connect/token';

    public static string $consumer_key;
    public static string $consumer_secret;
    public static string $apiAuth = 'https://apimws.bkn.go.id/oauth2/token';
    public static string $apiBase = 'https://apimws.bkn.go.id:8243/apisiasn/1.0';
    public Bknws $bknws;
    public Bknws $service;

    /**
     * @throws GuzzleException
     */
    public function __construct(string $sso_client_id, string $sso_username, string $sso_password, string $consumer_key, string $consumer_secret )
    {
        self::$_httpClient = new \GuzzleHttp\Client();
        self::$sso_client_id = $sso_client_id;
        self::$sso_username = $sso_username;
        self::$sso_password = $sso_password;
        self::$consumer_key = $consumer_key;
        self::$consumer_secret = $consumer_secret;
        self::$sso_grant_type = 'password';

        if (empty(self::$tokenSSO)||self::$tokenSSO['expires_in'] < time()) {
            self::$tokenSSO = self::getTokenSSO();
        }
        if (empty(self::$tokenAPI)||self::$tokenAPI['expires_in'] < time()) {
            self::$tokenAPI = self::getTokenAPI();
        }

        $guzzleClient = GuzzleClient::instance();
        ApiRequestor::setHttpClient($guzzleClient);
    }

    /**
     * Get Token SSO
     *
     * @return array
     * @throws GuzzleException
     */
    public static function getTokenSSO(): array
    {
        $client = new Client();
        $response = $client->request('POST', self::$sso_url, [
            'form_params' => [
                'client_id' => self::$sso_client_id,
                'grant_type' => self::$sso_grant_type,
                'username' => self::$sso_username,
                'password' => self::$sso_password,
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Get Token API
     *
     * @return array
     * @throws GuzzleException
     */
    public static function getTokenAPI(): array
    {
        $client = new Client();
        $response = $client->request('POST', self::$apiAuth, [
            'form_params' => [
                'client_id' => self::$consumer_key,
                'client_secret' => self::$consumer_secret,
                'grant_type' => 'client_credentials',
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

//    /**
//     * Get Token SSO
//     *
//     * @return string
//     */
//    public static function getAccessTokenSSO(): string
//    {
//        return self::$tokenSSO['access_token'];
//    }
//
//    /**
//     * Get Token API
//     *
//     * @return string
//     */
//    public static function getAccessTokenAPI(): string
//    {
//        return self::$tokenAPI['access_token'];
//    }

    public static function getApiBase():string
    {
        return self::$apiBase;
    }

    public static function setApiBase(string $apiBase): void
    {
        self::$apiBase = $apiBase;
    }

    public static function setHttpClient(HttpClientInterface $client ): void
    {
        self::$_httpClient = $client;
    }

    public static function getHttpClient(): \GuzzleHttp\Client
    {
//        var_dump(self::$_httpClient);
        return self::$_httpClient;
    }

}
