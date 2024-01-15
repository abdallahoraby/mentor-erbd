<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Flash;
use Response;

class UserController extends AppBaseController {
	/** @var  UserRepository */
	private $userRepository;
	public function __construct(UserRepository $userRepo) {
		$this->userRepository = $userRepo;
	}

	/**
	 * Display a listing of the User.
	 *
	 * @param UserDataTable $userDataTable
	 * @return Response
	 */
	public function index(UserDataTable $userDataTable) {
		return $userDataTable->render('admin.users.index');
	}

	/**
	 * Show the form for creating a new User.
	 *
	 * @return Response
	 */
	public function create() {
		return view('admin.users.create');
	}

	/**
	 * Store a newly created User in storage.
	 *
	 * @param CreateUserRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request) {
		$input = $request->all();

		$user = $this->userRepository->create($input);

		Flash::success(__('messages.saved', ['model' => __('models/users.singular')]));

		return redirect(route('admin.users.index'));
	}

	/**
	 * Display the specified User.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		$user = $this->userRepository->find($id);

		if (empty($user)) {
			Flash::error(__('messages.not_found', ['model' => __('models/users.singular')]));

			return redirect(route('admin.users.index'));
		}

		return view('admin.users.show')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified User.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id) {
		$user = $this->userRepository->find($id);

		if (empty($user)) {
			Flash::error(__('messages.not_found', ['model' => __('models/users.singular')]));

			return redirect(route('admin.users.index'));
		}

		return view('admin.users.edit')->with('user', $user);
	}

	/**
	 * Update the specified User in storage.
	 *
	 * @param  int              $id
	 * @param UpdateUserRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateUserRequest $request) {
		$user = $this->userRepository->find($id);

		if (empty($user)) {
			Flash::error(__('messages.not_found', ['model' => __('models/users.singular')]));

			return redirect(route('admin.users.index'));
		}
		$user = $this->userRepository->update($request->all(), $id);
		if (request()->ajax()) {
			return $this->sendResponse(
				new UserResource($user),
				__('messages.updated', ['model' => __('models/users.singular')])
			);
		} else {
			Flash::success(__('messages.updated', ['model' => __('models/users.singular')]));

			return redirect(route('admin.users.index'));
		}

	}

	/**
	 * Remove the specified User from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id) {
		$user = $this->userRepository->find($id);

		if (empty($user)) {
			Flash::error(__('messages.not_found', ['model' => __('models/users.singular')]));

			return redirect(route('admin.users.index'));
		}

		$this->userRepository->delete($id);

		Flash::success(__('messages.deleted', ['model' => __('models/users.singular')]));

		return redirect(route('admin.users.index'));
	}
}
