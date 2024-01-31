<?php

namespace Bknws;

use Bknws\Exceptions\ApiException;
use Bknws\TestCase;

class DiklatTest extends TestCase
{

    /**
     * Get Diklat by ID Riwayat Diklat Test
     * Should pass
     *
     * @return void
     * @throws ApiException
     */
    public function testGetDiklat()
    {
        $id = 'ff80808144245f070144296c81f03198';
        $data = Diklat::getDiklat($id);
        $this->assertArrayHasKey('data', $data);
    }
}
