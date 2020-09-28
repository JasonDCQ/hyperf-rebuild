<?php
/**
 * Created by PhpStorm.
 * Script Name: Server.php
 * Create: 9:13 下午
 * Description:
 * Author: Jason<dcq@kuryun.cn>
 */

namespace Rebuild\Server;


use Swoole\Server as SwooleServer;
use Swoole\Http\Server as SwooleHttpServer;

class Server implements ServerInterface
{
    /**
     * @var SwooleServer
     */
    protected $server;

    /**
     * @var array
     */
    protected $onRequestCallbacks = [];

    public function init(array $config): ServerInterface
    {
        // TODO: Implement init() method.
        foreach ($config['servers'] as $server) {
            $this->server = new SwooleHttpServer($server['host'], $server['port'], $server['type'], $server['sock_type']);
            $this->registerSwooleEvents($server['callbacks']);

            break;
        }
        return $this;
    }

    public function start()
    {
        // TODO: Implement start() method.
        $this->getServer()->start();
    }

    /**
     * @inheritDoc
     */
    public function getServer()
    {
        // TODO: Implement getServer() method.
        return $this->server;
    }

    protected function registerSwooleEvents(array $callbacks)
    {
        foreach ($callbacks as $swolleEvent => $callback) {
            [$class, $method] = $callback;
            $instance = new $class();
            $this->server->on($swolleEvent, [$instance, $method]);
        }
    }
}