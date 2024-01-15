<?php

namespace App\Repositories;

use App\Models\Country;
use App\Repositories\BaseRepository;

/**
 * Class CountryRepository
 * @package App\Repositories
 * @version January 27, 2020, 1:50 am UTC
 */

class CountryRepository extends BaseRepository {
	/**
	 * @var array
	 */
	protected $fieldSearchable = [
		'name',

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
		return Country::class;
	}

}
