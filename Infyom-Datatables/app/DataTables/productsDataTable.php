<?php

namespace App\DataTables;

use App\Models\products;
use Form;
use Yajra\Datatables\Services\DataTable;

class productsDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'products.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $products = products::query();

        return $this->applyScopes($products);
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
            'KODE PRODUK' => ['name' => 'productCode', 'data' => 'productCode'],
            'NAMA PRODUK' => ['name' => 'productName', 'data' => 'productName'],
            'SATUAN' => ['name' => 'unit', 'data' => 'unit'],
            // 'note' => ['name' => 'note', 'data' => 'note'],
            'STOCK' => ['name' => 'stock', 'data' => 'stock']
            // 'image' => ['name' => 'image', 'data' => 'image'],
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
        return 'products';
    }
}
