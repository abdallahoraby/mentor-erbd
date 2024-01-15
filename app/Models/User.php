<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable {
	use HasFactory, Notifiable, HasRoles  , Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'avatar',
		'phone',
		'bio',
		'email',
		'password',
		'address',
        'code',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [
		'name' => 'required|string',
		'email' => 'required|string',
		'password' => 'required|string',
	];


	public function isAdmin() {
		foreach ($this->roles()->get() as $role) {
			if ($role->name == 'admin') {
				return true;
			}
		}
		return false;
	}
}
