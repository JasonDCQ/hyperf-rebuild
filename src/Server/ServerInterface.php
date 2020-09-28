<?php
/**
 * Created by PhpStorm.
 * Script Name: ServerInterface.php
 * Create: 9:08 下午
 * Description:
 * Author: Jason<dcq@kuryun.cn>
 */

namespace Rebuild\Server;

use Hyperf\Server\ServerConfig;
use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Swoole\Coroutine\Server as SwooleCoServer;
use Swoole\Server as SwooleServer;

interface ServerInterface
{
    const SERVER_HTTP = 1;

    const SERVER_WEBSOCKET = 2;

    const SERVER_BASE = 3;

    public function init(array $config): ServerInterface;

    public function start();

    /**
     * @return SwooleCoServer|SwooleServer
     */
    public function getServer();
}