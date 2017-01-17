<?php

namespace App\DataTables;

use App\Models\company;
use Form;
use Yajra\Datatables\Services\DataTable;

class companyDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'companies.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $companies = company::query();

        return $this->applyScopes($companies);
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
            
            'NAMA PERUSAHAAN' => ['name' => 'companyName', 'data' => 'companyName'],
            // 'contactPerson' => ['name' => 'contactPerson', 'data' => 'contactPerson'],
            'ALAMAT' => ['name' => 'address', 'data' => 'address'],
            // 'village' => ['name' => 'village', 'data' => 'village'],
            // 'city' => ['name' => 'city', 'data' => 'city'],
            // 'zipcode' => ['name' => 'zipcode', 'data' => 'zipcode'],
            // 'province' => ['name' => 'province', 'data' => 'province'],
            // 'phone' => ['name' => 'phone', 'data' => 'phone'],
            'FAX' => ['name' => 'fax', 'data' => 'fax']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'companies';
    }
}
