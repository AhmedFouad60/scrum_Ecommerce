<?php

namespace App\DataTables;

use App\Models\products;
use App\Provider;
use Yajra\DataTables\Services\DataTable;

class productDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'Admin.products.partials.btnAction')
            ->rawColumns([
                'action'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(products $model)
    {
        return $model->query();
//        return $model->newQuery()->select('id', 'add-your-columns-here', 'created_at', 'updated_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->addAction(['width' => '80px','title' => 'التحكم'])
            //->parameters($this->getBuilderParameters());
            ->parameters([
                'dom' => 'Blfrtip',
                'buttons' => [
                    // ['extend'=>'csv','text'=>'test'],
                    [ 'extend'=>'excel','text'=>'<i class="fa fa-file-excel-o" style=" cursor: pointer;"></i>&nbsp;XL '],
                    //  ['extend'=> 'pdf','text'=>'test'],
                    [ 'extend'=>'print','text'=>'<i class="fa fa-print" style="cursor: pointer;"></i>&nbsp;print  ']
                    //   ,['extend'=> 'reset','text'=>'test'],
                    // [ 'extend'=>'reload','text'=>'test']
                ],
                'lengthMenu'=> [
                    [5, 10, 20, 25, -1],
                    [5, 10, 20, 25, "All"]
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {

        return [


            [
                'name'=>'id',
                'data'=>'id',
                'title'=>'ID'
            ], [
                'name'=>'title',
                'data'=>'title',
                'title'=>'Title'
            ], [
                'name'=>'quantity',
                'data'=>'quantity',
                'title'=>'Quantity'
            ],
            [
                'name'=>'weight',
                'data'=>'weight',
                'title'=>'Weight'
            ], [
                'name'=>'action',
                'data'=>'action',
                'title'=>'action',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,

            ],


        ];



    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'product_' . date('YmdHis');
    }
}
