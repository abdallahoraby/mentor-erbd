<?php

namespace App\DataTables;

use App\Models\CustomField;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class CustomFieldDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.custom_fields.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CustomField $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CustomField $model)
    {
        return $model->where('site_id',request('site_id'))->newQuery();
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
            'name' => new Column(['title' => __('models/custom_fields.fields.name'), 'data' => 'name']),
            'label_title' => new Column(['title' => __('models/custom_fields.fields.label_title'), 'data' => 'label_title']),
            'type' => new Column(['title' => __('models/custom_fields.fields.type'), 'data' => 'type']),
            'order' => new Column(['title' => __('models/custom_fields.fields.order'), 'data' => 'order'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'custom_fields_datatable_' . time();
    }
}
