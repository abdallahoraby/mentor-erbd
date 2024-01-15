<?php

namespace App\Repositories;

use App\Models\;
use App\Repositories\BaseRepository;

/**
 * Class Repository
 * @package App\Repositories
 * @version September 14, 2021, 2:23 pm UTC
*/

class Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ::class;
    }
}
