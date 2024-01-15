<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Theme
 * @package App\Models
 * @version September 18, 2023, 6:57 pm UTC
 *
 * @property string $title
 * @property string $image
 */
class Theme extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'themes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'image' => 'required |image'
    ];

    
}
