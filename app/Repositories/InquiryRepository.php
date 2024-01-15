<?php

namespace App\Repositories;

use App\Models\Inquiry;
use App\Repositories\BaseRepository;

/**
 * Class InquiryRepository
 * @package App\Repositories
 * @version November 15, 2022, 11:13 am UTC
*/

class InquiryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'site_id',
        'name',
        'email',
        'phone',
        'comment',
        'url',
        'ip_address'
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
        return Inquiry::class;
    }
}
