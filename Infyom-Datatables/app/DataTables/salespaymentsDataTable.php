<?php

namespace App\DataTables;

use App\Models\salespayments;
use Form;
use Yajra\Datatables\Services\DataTable;

class salespaymentsDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'salespayments.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $salespayments = salespayments::query();

        return $this->applyScopes($salespayments);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             // 'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'NO PAYMENT' => ['name' => 'paymentNo', 'data' => 'paymentNo'],
            'NO INVOICE' => ['name' => 'invoiceID', 'data' => 'invoiceID'],
            'paymentDate' => ['name' => 'paymentDate', 'data' => 'paymentDate'],
            'payType' => ['name' => 'payType', 'data' => 'payType'],
            // 'bankNo' => ['name' => 'bankNo', 'data' => 'bankNo'],
            // 'bankName' => ['name' => 'bankName', 'data' => 'bankName'],
            // 'bankAC' => ['name' => 'bankAC', 'data' => 'bankAC'],
            'effectiveDate' => ['name' => 'effectiveDate', 'data' => 'effectiveDate'],
            'TOTAL' => ['name' => 'total', 'data' => 'total'],
            // 'customerID' => ['name' => 'customerID', 'data' => 'customerID'],
            // 'customerName' => ['name' => 'customerName', 'data' => 'customerName'],
            // 'customerAddress' => ['name' => 'customerAddress', 'data' => 'customerAddress'],
            // 'ref' => ['name' => 'ref', 'data' => 'ref'],
            // 'note' => ['name' => 'note', 'data' => 'note'],
            //'staffID' => ['name' => 'staffID', 'data' => 'staffID']
             'DI BUAT OLEH' => ['name' => 'staffName', 'data' => 'staffName'],
            // 'createdDate' => ['name' => 'createdDate', 'data' => 'createdDate'],
            // 'createdUserID' => ['name' => 'createdUserID', 'data' => 'createdUserID'],
            // 'modifiedDate' => ['name' => 'modifiedDate', 'data' => 'modifiedDate'],
            // 'modifiedUserID' => ['name' => 'modifiedUserID', 'data' => 'modifiedUserID']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'salespayments';
    }
}
