<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CustomField
 * @package App\Models
 * @version August 31, 2022, 1:08 pm UTC
 *
 * @property integer $service_id
 * @property string $name
 * @property string $default_value
 * @property string $label_title
 * @property string $additional_class
 * @property string $validation
 * @property string $type
// * @property bollean $is_searchable
 * @property integer $order
 */
class CustomField extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'custom_fields';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'site_id',
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'site_id' => 'integer',
        'name' => 'string',
        'default_value' => 'string',
        'label_title' => 'string',
        'additional_class' => 'string',
        'validation' => 'string',
        'type' => 'string',
        'order' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'site_id' => 'required|exists:sites,id',
        'name' => 'required',
        'label_title' => 'required',
        'type' => 'required',
        'order' => 'required|numeric'
    ];


    public function site(){
        return $this->belongsTo(Site::class);
    }

    public function options()
    {
        return $this->hasMany(CustomFieldOption::class,'custom_field_id','id');
    }

}
