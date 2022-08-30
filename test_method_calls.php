<?php
// require vender autoload
require_once('vendor/autoload.php');

// add namespace at the top
use Performance\Performance;

// preparation
$max = 1;

Performance::point("Static Proxy(Facade - Laravel)");
App\DataUtil::call();
Performance::finish();

Performance::point("Normal Method call");
$obj = new App\Data;
$obj->call();
Performance::finish();

Performance::point("Method call using function");
function app()
{
	return new App\Data;
}
app()->call();
Performance::finish();


Performance::point("Static Method Call");
App\Datas::call();
Performance::finish();

Performance::point("Annomous Method Call");
(new App\Data)->call();
Performance::finish();


// finish all tasks and show test results
Performance::results();