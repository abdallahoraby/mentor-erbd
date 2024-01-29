<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use function date;
use function file_exists;
use function request;
use function time;
use function uniqid;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version November 23, 2019, 11:36 am UTC
 */

class UserRepository extends BaseRepository {
	/**
	 * @var array
	 */
	protected $fieldSearchable = [
		'name',
		'email',
		'password',
	];

	/**
	 * Return searchable fields
	 *
	 * @return array
	 */
	public function getFieldsSearchable() {
		return $this->fieldSearchable;
	}

	/**
	 * Configure the Model
	 **/
	public function model() {
		return User::class;
	}

	public function create($input) {

		$input['password'] = bcrypt($input['password']);
        if (request()->hasFile('avatar')) {
            $file = request()->file('avatar');
            $fileName = date('Y-m-d') . '-' . uniqid(time(), true).$file->getClientOriginalName();
            $input['avatar']  =  'images/users/'.$file->move('images/users', $fileName)->getFilename();
        }

		$model = $this->model->newInstance($input);
		$model->save();
		if (isset($input['role'])) {
			$model->assignRole($input['role']);
		}
		return $model;
	}

	public function update($input, $id) {
		$query = $this->model->newQuery();
		$model = $query->findOrFail($id);
        if (request()->hasFile('avatar')) {
            $file = request()->file('avatar');
            $extension =  'webp';
            $fileName = date('Y-m-d') . '-' . uniqid(time(), true).$file->getClientOriginalName(). '.' . $extension;
            $input['avatar']  =  'images/users/'.$file->move('images/users', $fileName ,'public')->getFilename();
        }
        else{
            $input['avatar']  =$model->avatar;
        }
		if (!request('password')) {
			$input['password'] = $model->password;
		} else {
			$input['password'] = bcrypt($input['password']);
		}

		$model->fill($input);
		$model->save();

		if (isset($input['role'])) {
			($model->roles->first()) ? $model->removeRole($model->roles->first()) : '';
			$model->assignRole($input['role']);
		}

		return $model;
	}
}
