<?php

namespace App\DataTables;

use App\Models\Site;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class SiteDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable
            ->editColumn('logo', function ($q) {
                return '<img class="card-img-top img-responsive img-rounded" height="50px;" src="' . url($q->logo) . '" / alt="' . $q->title . '">';
            })
            ->editColumn('title', function ($q) {
                return $q->title;
            })
            ->addColumn('action', 'admin.sites.datatables_actions')
            ->rawColumns([
                'title',
                'logo',
                'action',
            ]);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Site $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Site $model)
    {
        return $model->newQuery();
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
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                        'extend' => 'excel',
                        'className' => 'btn btn-info btn-sm',
                        'text' => '<i class="fa fa-download"></i> ' . __('auth.app.excel') . '',
                    ],
                    [
                        'extend' => 'print',
                        'className' => 'btn btn-success btn-sm',
                        'text' => '<i class="fa fa-print"></i> ' . __('auth.app.print') . '',
                    ],
                    [
                        'extend' => 'reset',
                        'className' => 'btn btn-warning btn-sm',
                        'text' => '<i class="fa fa-undo"></i> ' . __('auth.app.reset') . '',
                    ],
                    [
                        'extend' => 'reload',
                        'className' => 'btn btn-danger btn-sm',
                        'text' => '<i class="fa fa-refresh"></i> ' . __('auth.app.reload') . '',
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
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
            'title' => new Column(['title' => __('models/siteInfos.fields.title'), 'data' => 'title']),
            'logo' => new Column(['title' => __('models/siteInfos.fields.logo'), 'data' => 'logo']),
            'url' => new Column(['title' => __('models/sites.fields.url'), 'data' => 'url']),
            'theme_id' => new Column(['title' => __('models/sites.fields.theme_id'), 'data' => 'theme_id'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'sites_datatable_' . time();
    }
}
