<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Flash;
use Illuminate\Http\Request;

class RoleController extends Controller {

	public function __construct() {

		//$this->middleware('can:view_roles')->only('index');
		//$this->middleware('can:add_roles')->only('store');
		//$this->middleware('can:edit_roles')->only('update');
		//$this->middleware('can:delete_roles')->only('destroy');

	}
	public function index() {
		$roles = Role::whereNotIn('name', ['admin', 'company', 'user'])->get();
		$permissions = new Permission();
		return view('admin.role.index', compact('roles', 'permissions'));
	}

	public function store(Request $request) {

		$this->validate($request, ['name' => 'required|unique:roles']);

		if (Role::create($request->only('name'))) {
			Flash::success('Role Added');
		}

		return redirect()->back();
	}

	public function update(Request $request, $id) {
		if ($role = Role::findOrFail($id)) {
			// admin role has everything
			if ($role->name === 'Admin') {
				$role->syncPermissions(Permission::all());
				return redirect()->route('admin.roles.index');
			}

			$permissions = $request->get('permissions', []);
			$role->syncPermissions($permissions);
			Flash::success($role->name . ' permissions has been updated.');
		} else {
			Flash::error('Role with id ' . $id . ' note found.');
		}

		return redirect()->route('admin.roles.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$role = Role::find($id);
		$role->delete();
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('roles'));
	}
}
