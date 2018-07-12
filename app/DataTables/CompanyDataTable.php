<?php

namespace App\DataTables;

use App\Company;
use App\User;
use Yajra\DataTables\Services\DataTable;

class CompanyDataTable extends DataTable
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
            ->addColumn('action', 'companies.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Company $model)
    {
        return $model->newQuery()->select('id', 'name', 'phone', 'address', 'field', 'visites_date', 'country_id' ,'created_at', 'updated_at');
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
            ->parameters([
                'dom'     => 'Blfrtip',
                'order'   => [[0, 'desc']],
                "lengthMenu" => [[10, 25, 50, -1], [10, 25, 50, "All"]],
                'buttons' => [
                    ['extend' =>'create' , 'text' =>  '<i class="fa fa-plus"></i>'. __('pages.create') , 'className' =>'dt-button buttons-copy buttons-html5 btn btn-default legitRipple'],
                    ['extend' => 'export', 'text' => '<i class="fa fa-download"></i>'.__('pages.export') , 'className' =>'dt-button buttons-copy buttons-html5 btn btn-default legitRipple'],
                    ['extend' => 'print' , 'text' => '<i class="fa fa-print"></i>'.__('pages.print') , 'className' =>'dt-button buttons-copy buttons-html5 btn btn-default legitRipple'],
                    ['extend' =>  'colvis' , 'className' => 'dt-button buttons-collection buttons-colvis btn bg-blue btn-icon legitRipple' , 'text' => '<span><i class="icon-three-bars"></i> <span class="caret"></span></span>']

                ],
                'language' => ['url' => asset(app()->getLocale().'-datatable.json')],
                'responsive'=>true,

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
            'id' => ['name' => 'id' ,'data' => 'id' , 'title' =>  __('pages.id')],
            'name' => ['name' => 'name' ,'data' => 'name' ,'title' => __('pages.name')],
            'phone' => ['name' => 'phone' ,'data' => 'phone' ,'title' => __('pages.phone')],
            'address' => ['name' => 'address' ,'data' => 'address' ,'title' => __('pages.address')],
            'field' => ['name' => 'field' ,'data' => 'field' ,'title' => __('pages.field')],
            'visites_date' => ['name' => 'visites_date' ,'data' => 'visites_date' ,'title' => __('pages.visites_date')],
        //    'country' => ['name' => 'country' ,'data' => 'country_id' ,'title' => __('pages.country')],
            'action' => [ 'exportable' => false, 'printable'  => false, 'searchable' => false, 'orderable'  => false, 'title' => __('pages.action')]

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Company_' . date('YmdHis');
    }
}
