<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssigmentApiTest extends TestCase
{
    use MakeAssigmentTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAssigment()
    {
        $assigment = $this->fakeAssigmentData();
        $this->json('POST', '/api/v1/assigments', $assigment);

        $this->assertApiResponse($assigment);
    }

    /**
     * @test
     */
    public function testReadAssigment()
    {
        $assigment = $this->makeAssigment();
        $this->json('GET', '/api/v1/assigments/'.$assigment->assigment_id);

        $this->assertApiResponse($assigment->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAssigment()
    {
        $assigment = $this->makeAssigment();
        $editedAssigment = $this->fakeAssigmentData();

        $this->json('PUT', '/api/v1/assigments/'.$assigment->assigment_id, $editedAssigment);

        $this->assertApiResponse($editedAssigment);
    }

    /**
     * @test
     */
    public function testDeleteAssigment()
    {
        $assigment = $this->makeAssigment();
        $this->json('DELETE', '/api/v1/assigments/'.$assigment->iassigment_idd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/assigments/'.$assigment->assigment_id);

        $this->assertResponseStatus(404);
    }
}
