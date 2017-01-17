<?php

namespace App\DataTables;

use App\Models\salesorders;
use Form;
use Yajra\Datatables\Services\DataTable;

class salesordersDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'salesorders.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $salesorders = salesorders::query();

        return $this->applyScopes($salesorders);
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
            'soNo' => ['name' => 'soNo', 'data' => 'soNo'],
            // 'customerID' => ['name' => 'customerID', 'data' => 'customerID'],
            'customerName' => ['name' => 'customerName', 'data' => 'customerName'],
            // 'customerAddress' => ['name' => 'customerAddress', 'data' => 'customerAddress'],
            // 'staffID' => ['name' => 'staffID', 'data' => 'staffID'],
            'staffName' => ['name' => 'staffName', 'data' => 'staffName'],
            'orderDate' => ['name' => 'orderDate', 'data' => 'orderDate'],
            'needDate' => ['name' => 'needDate', 'data' => 'needDate']
            // 'note' => ['name' => 'note', 'data' => 'note'],
            // 'status' => ['name' => 'status', 'data' => 'status'],
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
        return 'salesorders';
    }
}
