<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReportApiTest extends TestCase
{
    use MakeReportTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateReport()
    {
        $report = $this->fakeReportData();
        $this->json('POST', '/api/v1/reports', $report);

        $this->assertApiResponse($report);
    }

    /**
     * @test
     */
    public function testReadReport()
    {
        $report = $this->makeReport();
        $this->json('GET', '/api/v1/reports/'.$report->report_id);

        $this->assertApiResponse($report->toArray());
    }

    /**
     * @test
     */
    public function testUpdateReport()
    {
        $report = $this->makeReport();
        $editedReport = $this->fakeReportData();

        $this->json('PUT', '/api/v1/reports/'.$report->report_id, $editedReport);

        $this->assertApiResponse($editedReport);
    }

    /**
     * @test
     */
    public function testDeleteReport()
    {
        $report = $this->makeReport();
        $this->json('DELETE', '/api/v1/reports/'.$report->ireport_idd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/reports/'.$report->report_id);

        $this->assertResponseStatus(404);
    }
}
