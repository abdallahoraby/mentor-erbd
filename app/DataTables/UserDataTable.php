<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use function url;

class UserDataTable extends DataTable {
	/**
	 * Build DataTable class.
	 *
	 * @param mixed $query Results from query() method.
	 * @return \Yajra\DataTables\DataTableAbstract
	 */
	public function dataTable($query) {
		$dataTable = new EloquentDataTable($query);

		return $dataTable->addColumn('action', 'admin.users.datatables_actions')

			->addColumn('role', function ($q) {
				return optional($q->roles->first())->name;
			})
			->rawColumns([
				'name',
				'action',
				'role',
			]);
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Models\User $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(User $model) {
		if (request('role')) {
			return $model->whereHas('roles', function ($q) {
				$q->where('name', request('role'));
			})->newQuery();
		}
		return $model->newQuery();
	}

	/**
	 * Optional method if you want to use html builder.
	 *
	 * @return \Yajra\DataTables\Html\Builder
	 */
	public function html() {
		$buttons = [];
		if (auth()->user()->roles()->first()->name == 'admin') {
			$buttons[] = [
				'extend' => 'excel',
				'className' => 'btn btn-info btn-sm',
				'text' => '<i class="fa fa-download"></i> ' . __('auth.app.excel') . '',
			];
			$buttons[] = [
				'extend' => 'print',
				'className' => 'btn btn-success btn-sm',
				'text' => '<i class="fa fa-print"></i> ' . __('auth.app.print') . '',
			];
		}
		return $this->builder()
			->columns($this->getColumns())
			->minifiedAjax()
			->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
			->parameters([
				'dom' => 'Bfrtip',
				'stateSave' => true,
				'order' => [[0, 'desc']],
				'buttons' => $buttons,
				'language' => [
					'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/Arabic.json'),
				],
			]);
	}

	/**
	 * Get columns.
	 *
	 * @return array
	 */
	protected function getColumns() {
		return [
			'name' => new Column(['title' => __('models/users.fields.name'), 'data' => 'name', 'searchable' => true]),
			'role' => new Column(['title' => __('models/users.fields.role'), 'data' => 'role', 'searchable' => true]),
			'email' => new Column(['title' => __('models/users.fields.email'), 'data' => 'email', 'searchable' => true]),
			'phone' => new Column(['title' => __('models/users.fields.phone'), 'data' => 'phone', 'searchable' => true]),

		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename() {
		return 'users_datatable_' . time();
	}
}
