<?php

namespace App\Repositories;

use App\Models\Theme;
use App\Repositories\BaseRepository;

/**
 * Class ThemeRepository
 * @package App\Repositories
 * @version September 18, 2023, 6:57 pm UTC
*/

class ThemeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'image'
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
        return Theme::class;
    }
}
