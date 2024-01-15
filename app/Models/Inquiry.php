<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Inquiry
 * @package App\Models
 * @version November 15, 2022, 11:13 am UTC
 *
 * @property integer $site_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $comment
 * @property string $url
 * @property string $ip_address
 */
class Inquiry extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'inquiries';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'site_id',
        'name',
        'email',
        'phone',
        'saved_data',
        'comment',
        'url',
        'ip_address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'site_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'comment' => 'string',
        'url' => 'string',
        'ip_address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
    ];


}
