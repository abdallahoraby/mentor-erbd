<?php

namespace App\Repositories;

use App\Models\Site;
use App\Repositories\BaseRepository;

/**
 * Class SiteRepository
 * @package App\Repositories
 * @version September 18, 2023, 9:03 pm UTC
*/

class SiteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'url',
        'theme_id'
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
        return Site::class;
    }
}
