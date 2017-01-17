<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConfirmApiTest extends TestCase
{
    use MakeConfirmTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateConfirm()
    {
        $confirm = $this->fakeConfirmData();
        $this->json('POST', '/api/v1/confirms', $confirm);

        $this->assertApiResponse($confirm);
    }

    /**
     * @test
     */
    public function testReadConfirm()
    {
        $confirm = $this->makeConfirm();
        $this->json('GET', '/api/v1/confirms/'.$confirm->id);

        $this->assertApiResponse($confirm->toArray());
    }

    /**
     * @test
     */
    public function testUpdateConfirm()
    {
        $confirm = $this->makeConfirm();
        $editedConfirm = $this->fakeConfirmData();

        $this->json('PUT', '/api/v1/confirms/'.$confirm->id, $editedConfirm);

        $this->assertApiResponse($editedConfirm);
    }

    /**
     * @test
     */
    public function testDeleteConfirm()
    {
        $confirm = $this->makeConfirm();
        $this->json('DELETE', '/api/v1/confirms/'.$confirm->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/confirms/'.$confirm->id);

        $this->assertResponseStatus(404);
    }
}
