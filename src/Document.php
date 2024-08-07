<?php

namespace Bknws;

use Bknws\ApiOperations\Create;
use Bknws\ApiOperations\Request;
use Bknws\ApiOperations\Retrieve;
use Bknws\Exceptions\ApiException;
use Bknws\ApiOperations\ResponseHandler;

class Document
{
    use Request;
    use Create;
    use Retrieve;
    use ResponseHandler;

    /**
     * resourceUrl
     *
     * @return string
     */
    public static function resourceUrl(): string
    {
        return Bknws::$apiBase. '/upload-dok';
    }

    /**
     * Instantiate required params for Create
     *
     * @return array
     */
    public static function createReqParams(): array
    {
        return [
            'file',
            'id_ref_dokumen'
        ];
    }

    /**
     * Post a file Document to API
     *
     * @param array $params
     * @return array
     * @throws ApiException
     * @throws \Exception
     */
    public static function uploadDocument(array $params = []): array
    {
        try{
            $url = static::resourceUrl();
            $result = static::_requestMultipart('POST', $url, $params);
            return self::handleSuccess($result);
        } catch (ApiException $e) {
            return self::handleError($e);
        }

    }

    /**
     * Get a file Document to API
     *
     * @param string $filePath
     * @param string $savePath
     * @return array
     */
    public static function downloadDocument(string $filePath, string $savePath=''): array
    {
        $url = Bknws::$apiBase. '/download-dok?filePath='.$filePath;
        if ($savePath) {
            $params = [
                'savePath' => $savePath,
            ];
            return static::_retrieveDocument($url, $params);
        }
        $fileName = basename($filePath);
        $params = [
            'savePath' => __DIR__.'/'. $fileName,
        ];
        return static::_retrieveDocument($url, $params);
    }

}
