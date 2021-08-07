<?php
$hetznerUsername = 'ravimhesuf';

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/
if(strpos(__DIR__, $hetznerUsername))
{
    if (file_exists('/usr/home/'.$hetznerUsername.'/storage/framework/maintenance.php')) {
        require '/usr/home/'.$hetznerUsername.'/storage/framework/maintenance.php';
    }
    require '/usr/home/'.$hetznerUsername.'/vendor/autoload.php';
    $app = require_once '/usr/home/'.$hetznerUsername.'/bootstrap/app.php';

}else{
    require __DIR__.'/../vendor/autoload.php';
    $app = require_once __DIR__.'/../bootstrap/app.php';
}


$kernel = $app->make(Kernel::class);

$response = tap($kernel->handle(
    $request = Request::capture()
))->send();

$kernel->terminate($request, $response);

