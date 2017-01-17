<?php

use App\Models\Confirm;
use App\Repositories\ConfirmRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConfirmRepositoryTest extends TestCase
{
    use MakeConfirmTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConfirmRepository
     */
    protected $confirmRepo;

    public function setUp()
    {
        parent::setUp();
        $this->confirmRepo = App::make(ConfirmRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateConfirm()
    {
        $confirm = $this->fakeConfirmData();
        $createdConfirm = $this->confirmRepo->create($confirm);
        $createdConfirm = $createdConfirm->toArray();
        $this->assertArrayHasKey('id', $createdConfirm);
        $this->assertNotNull($createdConfirm['id'], 'Created Confirm must have id specified');
        $this->assertNotNull(Confirm::find($createdConfirm['id']), 'Confirm with given id must be in DB');
        $this->assertModelData($confirm, $createdConfirm);
    }

    /**
     * @test read
     */
    public function testReadConfirm()
    {
        $confirm = $this->makeConfirm();
        $dbConfirm = $this->confirmRepo->find($confirm->id);
        $dbConfirm = $dbConfirm->toArray();
        $this->assertModelData($confirm->toArray(), $dbConfirm);
    }

    /**
     * @test update
     */
    public function testUpdateConfirm()
    {
        $confirm = $this->makeConfirm();
        $fakeConfirm = $this->fakeConfirmData();
        $updatedConfirm = $this->confirmRepo->update($fakeConfirm, $confirm->id);
        $this->assertModelData($fakeConfirm, $updatedConfirm->toArray());
        $dbConfirm = $this->confirmRepo->find($confirm->id);
        $this->assertModelData($fakeConfirm, $dbConfirm->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteConfirm()
    {
        $confirm = $this->makeConfirm();
        $resp = $this->confirmRepo->delete($confirm->id);
        $this->assertTrue($resp);
        $this->assertNull(Confirm::find($confirm->id), 'Confirm should not exist in DB');
    }
}
