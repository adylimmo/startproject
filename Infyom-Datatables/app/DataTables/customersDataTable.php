<?php

namespace App\DataTables;

use App\Models\customers;
use Form;
use Yajra\Datatables\Services\DataTable;

class customersDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'customers.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $customers = customers::query();

        return $this->applyScopes($customers);
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
            'KODE' => ['name' => 'customerCode', 'data' => 'customerCode'],
            'NAMA  CUSTOMER' => ['name' => 'customerName', 'data' => 'customerName'],
            'KONTAK  PERSON' => ['name' => 'contactPerson', 'data' => 'contactPerson'],
            // 'address' => ['name' => 'address', 'data' => 'address'],
            // 'address2' => ['name' => 'address2', 'data' => 'address2'],
            // 'village' => ['name' => 'village', 'data' => 'village'],
            // 'district' => ['name' => 'district', 'data' => 'district'],
            // 'city' => ['name' => 'city', 'data' => 'city'],
            // 'zipCode' => ['name' => 'zipCode', 'data' => 'zipCode'],
            'KOTA' => ['name' => 'province', 'data' => 'province'],
            'TLP' => ['name' => 'phone', 'data' => 'phone'],
            // 'fax' => ['name' => 'fax', 'data' => 'fax'],
            // 'phonecp1' => ['name' => 'phonecp1', 'data' => 'phonecp1'],
            // 'phonecp2' => ['name' => 'phonecp2', 'data' => 'phonecp2'],
            // 'email' => ['name' => 'email', 'data' => 'email'],
            // 'note' => ['name' => 'note', 'data' => 'note'],
            // 'npwp' => ['name' => 'npwp', 'data' => 'npwp'],
            // 'pkpName' => ['name' => 'pkpName', 'data' => 'pkpName'],
            'KATEGORI' => ['name' => 'category', 'data' => 'category']
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
        return 'customers';
    }
}
