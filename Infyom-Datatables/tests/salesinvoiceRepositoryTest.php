<?php

use App\Models\salesinvoice;
use App\Repositories\salesinvoiceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class salesinvoiceRepositoryTest extends TestCase
{
    use MakesalesinvoiceTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var salesinvoiceRepository
     */
    protected $salesinvoiceRepo;

    public function setUp()
    {
        parent::setUp();
        $this->salesinvoiceRepo = App::make(salesinvoiceRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesalesinvoice()
    {
        $salesinvoice = $this->fakesalesinvoiceData();
        $createdsalesinvoice = $this->salesinvoiceRepo->create($salesinvoice);
        $createdsalesinvoice = $createdsalesinvoice->toArray();
        $this->assertArrayHasKey('id', $createdsalesinvoice);
        $this->assertNotNull($createdsalesinvoice['id'], 'Created salesinvoice must have id specified');
        $this->assertNotNull(salesinvoice::find($createdsalesinvoice['id']), 'salesinvoice with given id must be in DB');
        $this->assertModelData($salesinvoice, $createdsalesinvoice);
    }

    /**
     * @test read
     */
    public function testReadsalesinvoice()
    {
        $salesinvoice = $this->makesalesinvoice();
        $dbsalesinvoice = $this->salesinvoiceRepo->find($salesinvoice->id);
        $dbsalesinvoice = $dbsalesinvoice->toArray();
        $this->assertModelData($salesinvoice->toArray(), $dbsalesinvoice);
    }

    /**
     * @test update
     */
    public function testUpdatesalesinvoice()
    {
        $salesinvoice = $this->makesalesinvoice();
        $fakesalesinvoice = $this->fakesalesinvoiceData();
        $updatedsalesinvoice = $this->salesinvoiceRepo->update($fakesalesinvoice, $salesinvoice->id);
        $this->assertModelData($fakesalesinvoice, $updatedsalesinvoice->toArray());
        $dbsalesinvoice = $this->salesinvoiceRepo->find($salesinvoice->id);
        $this->assertModelData($fakesalesinvoice, $dbsalesinvoice->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesalesinvoice()
    {
        $salesinvoice = $this->makesalesinvoice();
        $resp = $this->salesinvoiceRepo->delete($salesinvoice->id);
        $this->assertTrue($resp);
        $this->assertNull(salesinvoice::find($salesinvoice->id), 'salesinvoice should not exist in DB');
    }
}
