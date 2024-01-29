<?php

namespace App\DataTables;

use App\Models\Inquiry;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use function __;
use function url;

class InquiryDataTable extends DataTable
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

        return $dataTable ->editColumn('created_at', function ($q) {
            return $q->created_at->format('Y-m-d');
        })
            ->addColumn('action', 'admin.inquiries.datatables_actions')
            ->rawColumns([
                'created_at',
                'action',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Inquiry $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Inquiry $model)
    {
        if (request('site_id'))
            return $model->where('site_id', request('site_id'))->newQuery();
        else
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
            'name' => new Column(['title' => __('models/inquiries.fields.name'), 'data' => 'name']),
            'email' => new Column(['title' => __('models/inquiries.fields.email'), 'data' => 'email']),
            'phone' => new Column(['title' => __('models/inquiries.fields.phone'), 'data' => 'phone']),
            'url' => new Column(['title' => __('models/inquiries.fields.url'), 'data' => 'url']),
            'created_at' => new Column(['title' => __('models/inquiries.fields.created_at'), 'data' => 'created_at']),


        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'inquiries_datatable_' . time();
    }
}
