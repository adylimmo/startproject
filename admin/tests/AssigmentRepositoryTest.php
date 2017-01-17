<?php

use App\Models\Assigment;
use App\Repositories\AssigmentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssigmentRepositoryTest extends TestCase
{
    use MakeAssigmentTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AssigmentRepository
     */
    protected $assigmentRepo;

    public function setUp()
    {
        parent::setUp();
        $this->assigmentRepo = App::make(AssigmentRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAssigment()
    {
        $assigment = $this->fakeAssigmentData();
        $createdAssigment = $this->assigmentRepo->create($assigment);
        $createdAssigment = $createdAssigment->toArray();
        $this->assertArrayHasKey('id', $createdAssigment);
        $this->assertNotNull($createdAssigment['id'], 'Created Assigment must have id specified');
        $this->assertNotNull(Assigment::find($createdAssigment['id']), 'Assigment with given id must be in DB');
        $this->assertModelData($assigment, $createdAssigment);
    }

    /**
     * @test read
     */
    public function testReadAssigment()
    {
        $assigment = $this->makeAssigment();
        $dbAssigment = $this->assigmentRepo->find($assigment->assigment_id);
        $dbAssigment = $dbAssigment->toArray();
        $this->assertModelData($assigment->toArray(), $dbAssigment);
    }

    /**
     * @test update
     */
    public function testUpdateAssigment()
    {
        $assigment = $this->makeAssigment();
        $fakeAssigment = $this->fakeAssigmentData();
        $updatedAssigment = $this->assigmentRepo->update($fakeAssigment, $assigment->assigment_id);
        $this->assertModelData($fakeAssigment, $updatedAssigment->toArray());
        $dbAssigment = $this->assigmentRepo->find($assigment->assigment_id);
        $this->assertModelData($fakeAssigment, $dbAssigment->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAssigment()
    {
        $assigment = $this->makeAssigment();
        $resp = $this->assigmentRepo->delete($assigment->assigment_id);
        $this->assertTrue($resp);
        $this->assertNull(Assigment::find($assigment->assigment_id), 'Assigment should not exist in DB');
    }
}
