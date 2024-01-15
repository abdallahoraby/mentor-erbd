<?php

namespace App\Repositories;

use App\Models\CustomField;
use App\Repositories\BaseRepository;

/**
 * Class CustomFieldRepository
 * @package App\Repositories
 * @version August 31, 2022, 1:08 pm UTC
*/

class CustomFieldRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'service_id',
        'name',
        'default_value',
        'label_title',
        'additional_class',
        'validation',
        'type',
        'is_searchable',
        'order'
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
        return CustomField::class;
    }

    public function add_options($request,$customField){
        if ($request->select_options) {
            $customField->options()->delete();
            foreach ($request->select_options as $key => $value) {
                if ($value <> null) {
                    $customField->options()->updateOrCreate([
                        'title' => $value,
                    ]);
                }
            }
        }
    }
}
