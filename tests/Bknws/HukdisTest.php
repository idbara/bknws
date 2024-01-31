<?php

namespace Bknws;

use Bknws\Exceptions\ApiException;

class HukdisTest extends TestCase
{

    /**
     * Get Hukdis by ID Riwayat Hukdis Test
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetHukdis()
    {
        $id = 'ff80808144245f070144296c81f03198';
        $data = Hukdis::getHukdis($id);
        $this->assertArrayHasKey('data', $data);
    }
}
