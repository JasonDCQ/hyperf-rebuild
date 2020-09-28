<?php
/**
 * Created by PhpStorm.
 * Script Name: rebuild.php
 * Create: 8:24 下午
 * Description:
 * Author: Jason<dcq@kuryun.cn>
 */

use Rebuild\Command\StartCommand;
use Rebuild\Config\ConfigFactory;
use Symfony\Component\Console\Application;

require 'vendor/autoload.php';

! defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));

$application = new Application();
$config = new ConfigFactory();
$config = $config();
$commands = $config->get('commands');
foreach ($commands as $command) {
    if ($command === StartCommand::class) {
        $application->add(new StartCommand($config));
    } else {
        $application->add(new $command);
    }
}
$application->run();
