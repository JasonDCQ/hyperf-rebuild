<?php
/**
 * Created by PhpStorm.
 * Script Name: ServerFactory.php
 * Create: 9:59 下午
 * Description:
 * Author: Jason<dcq@kuryun.cn>
 */
namespace Rebuild\Server;

class ServerFactory
{
    protected $serverConfig = [];
    protected $server;

    public function configure(array $configs) {
        $this->serverConfig = $configs;
        $this->getServer()->init($this->serverConfig);
    }

    public function getServer(): Server {
        if(! isset($this->server)) {
            $this->server = new Server();
        }

        return $this->server;
    }
}