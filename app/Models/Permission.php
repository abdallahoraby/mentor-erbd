<?php
namespace App\Models;
class Permission extends \Spatie\Permission\Models\Permission {
	protected $fillable = ['name','guard_name'];

	public static function defaultPermissions() {
		return [

            'admin',

			'view_users',
			'add_users',
			'edit_users',
			'delete_users',

			'view_roles',
			'add_roles',
			'edit_roles',
			'delete_roles',

            'view_countries',
            'add_countries',
            'edit_countries',
            'delete_countries',

            'view_themes',
            'add_themes',
            'edit_themes',
            'delete_themes',

			'view_sites',
			'add_sites',
			'edit_sites',
			'delete_sites',

            'view_custom_fields',
            'add_custom_fields',
            'edit_custom_fields',
            'delete_custom_fields',

            'view_inquiries',
            'add_inquiries',
            'edit_inquiries',
            'delete_inquiries',


            'view_dashboard',

		];
	}
}
