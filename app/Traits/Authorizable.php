<?php

namespace App\Traits;

trait Authorizable {
	private $abilities = [
		'index' => 'view',
		'edit' => 'edit',
		'show' => 'view',
		'update' => 'edit',
		'create' => 'add',
		'store' => 'add',
		'destroy' => 'delete',
	];

	/**
	 * Override of callAction to perform the authorization before
	 *
	 * @param $method
	 * @param $parameters
	 * @return mixed
	 */
	public function callAction($method, $parameters) {
		if ($ability = $this->getAbility($method)) {
			$this->authorize($ability);
		}

		return parent::callAction($method, $parameters);
	}

	public function getAbility($method) {
		$routeName = explode('.', \Request::route()->getName());
		$action = $this->array_get($this->getAbilities(), $method);

		if (!isset($routeName[1])) {
			return null;
		}
		return $action ? $action . '_' . $routeName[1] : null;
	}

	private function getAbilities() {

		return $this->abilities;
	}

	public function setAbilities($abilities) {
		$this->abilities = $abilities;
	}
}
