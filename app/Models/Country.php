<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Country
 * @package App\Models
 * @version September 14, 2021, 2:33 pm UTC
 *
 * @property integer $name
 */


class Country extends Model {
	use HasFactory;
	protected $dates = ['deleted_at'];

	public $fillable = [
		'name',
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id' => 'integer',
		'name' => 'string',
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [

	];

}
