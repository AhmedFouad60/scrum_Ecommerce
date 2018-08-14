<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Spatie\Permission\Models\Role;

class userDatatable extends DataTable
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
            ->addColumn('action', 'Admin.Users.Partials.btnAction')
//            ->addColumn('role', 'Admin.Users.Partials.Role')

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
    public function query(User $model)
    {
//        return $model->query();
//        return $model->newQuery()->select('id','name','email');

        $users=$model->select([
            'users.id',
            'users.name',
            'users.email',
            'roles.name as role'
        ])
            ->leftJoin('model_has_roles','users.id','=','model_has_roles.model_id')
            ->leftJoin('roles','roles.id','=','model_has_roles.role_id');




        return $users;

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
               'title'=>'Name'
           ], [
               'name'=>'email',
               'data'=>'email',
               'title'=>'Email'
           ], [
               'name'=>'action',
               'data'=>'action',
               'title'=>'action',
               'exportable'=>false,
               'printable'=>false,
               'orderable'=>false,
               'searchable'=>false,

           ],

           [
               'name'=>'role',
               'data'=>'role',
               'title'=>'role',
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
        return 'user_' . date('YmdHis');
    }
}
