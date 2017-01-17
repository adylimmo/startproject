<?php

namespace App\DataTables;

use App\Models\salesinvoice;
use Form;
use Yajra\Datatables\Services\DataTable;

class salesinvoiceDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'salesinvoices.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $salesinvoices = salesinvoice::query();

        return $this->applyScopes($salesinvoices);
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
            'invoiceNo' => ['name' => 'invoiceNo', 'data' => 'invoiceNo'],
            'invoiceDate' => ['name' => 'invoiceDate', 'data' => 'invoiceDate'],
            'soID' => ['name' => 'soID', 'data' => 'soID'],
            'status' => ['name' => 'status', 'data' => 'status'],
            'paymentType' => ['name' => 'paymentType', 'data' => 'paymentType'],
            'expiredPayment' => ['name' => 'expiredPayment', 'data' => 'expiredPayment'],
            'ppn' => ['name' => 'ppn', 'data' => 'ppn'],
            'total' => ['name' => 'total', 'data' => 'total'],
            'discount' => ['name' => 'discount', 'data' => 'discount'],
            'grandtotal' => ['name' => 'grandtotal', 'data' => 'grandtotal'],
            'customerID' => ['name' => 'customerID', 'data' => 'customerID'],
            'customerName' => ['name' => 'customerName', 'data' => 'customerName'],
            'customerAddress' => ['name' => 'customerAddress', 'data' => 'customerAddress'],
            'staffID' => ['name' => 'staffID', 'data' => 'staffID'],
            'createdDate' => ['name' => 'createdDate', 'data' => 'createdDate'],
            'createdUserID' => ['name' => 'createdUserID', 'data' => 'createdUserID'],
            'modifiedDate' => ['name' => 'modifiedDate', 'data' => 'modifiedDate'],
            'modifiedUserID' => ['name' => 'modifiedUserID', 'data' => 'modifiedUserID']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'salesinvoices';
    }
}
