<?php
/**
 * Created by PhpStorm.
 * Script Name: StartCommand.php
 * Create: 8:42 下午
 * Description:
 * Author: Jason<dcq@kuryun.cn>
 */

namespace Rebuild\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StartCommand extends Command
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            // 命令的名字（"bin/console" 后面的部分）
            ->setName('start')

            // the short description shown while running "php bin/console list"
            // 运行 "php bin/console list" 时的简短描述
            ->setDescription('启动服务')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $http = new \Swoole\Http\Server('0.0.0.0', 9501);

        $http->on('request', function ($request, $response) {
            $response->header("Content-Type", "text/html; charset=utf-8");
            $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
        });

        $http->start();
        return 1;
    }


}