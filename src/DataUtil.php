<?php

namespace App;

use App\Facades\Facade;

class DataUtil extends Facade
{
	protected static function getInstantAccessor()
	{
		return Data::class;
	}
}