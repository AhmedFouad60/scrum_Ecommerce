<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Spatie\Permission\Models\Role;

class rolesDatatable extends DataTable
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
            ->addColumn('action', 'Admin.roles.Partials.btnAction')
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
    public function query()
    {
//        return $model->query();
//        return $model->newQuery()->select('id','name','email');

        $roles=Role::select([
            'roles.id',
            'roles.name',
            'permissions.name as permission',
        ])
            ->leftJoin('role_has_permissions','roles.id','=','role_has_permissions.role_id')
            ->leftJoin('permissions','permissions.id','=','role_has_permissions.permission_id');




        return $roles;

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
//            ->addAction(['width' => '80px','title' => 'control'])
//            ->parameters($this->getBuilderParameters());
            ->parameters([
                'dom' => 'Blfrtip',
                'buttons' => [
                    // ['extend'=>'csv','text'=>'test'],
                    [ 'extend'=>'excel','text'=>'<i class="fa fa-file-excel-o"  style="cursor: pointer;"></i>&nbsp;XL '],
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
                'name'=>'name',
                'data'=>'name',
                'title'=>'role'
            ], [
                'name'=>'permission',
                'data'=>'permission',
                'title'=>'permission',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,

            ],[
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
        return 'role_' . date('YmdHis');
    }
}
