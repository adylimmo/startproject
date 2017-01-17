<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class salesinvoiceApiTest extends TestCase
{
    use MakesalesinvoiceTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesalesinvoice()
    {
        $salesinvoice = $this->fakesalesinvoiceData();
        $this->json('POST', '/api/v1/salesinvoices', $salesinvoice);

        $this->assertApiResponse($salesinvoice);
    }

    /**
     * @test
     */
    public function testReadsalesinvoice()
    {
        $salesinvoice = $this->makesalesinvoice();
        $this->json('GET', '/api/v1/salesinvoices/'.$salesinvoice->id);

        $this->assertApiResponse($salesinvoice->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesalesinvoice()
    {
        $salesinvoice = $this->makesalesinvoice();
        $editedsalesinvoice = $this->fakesalesinvoiceData();

        $this->json('PUT', '/api/v1/salesinvoices/'.$salesinvoice->id, $editedsalesinvoice);

        $this->assertApiResponse($editedsalesinvoice);
    }

    /**
     * @test
     */
    public function testDeletesalesinvoice()
    {
        $salesinvoice = $this->makesalesinvoice();
        $this->json('DELETE', '/api/v1/salesinvoices/'.$salesinvoice->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/salesinvoices/'.$salesinvoice->id);

        $this->assertResponseStatus(404);
    }
}
