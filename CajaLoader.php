<?php

// setup the autoloading
require_once 'vendor/autoload.php';
// setup Propel
require_once 'generated-conf/config.php';
// setup common classes
require '../common/HTMLGenerator.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('defaultLogger');
$log->pushHandler(new StreamHandler('../log/caja.log', Logger::DEBUG));

$serviceContainer->setLogger('defaultLogger', $log);

function _e($msg) {
    echo $msg;
}
function _d($msg) {
    var_dump($msg);
}

?>
