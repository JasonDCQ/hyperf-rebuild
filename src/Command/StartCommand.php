<?php
/**
 * Created by PhpStorm.
 * Script Name: StartCommand.php
 * Create: 8:42 下午
 * Description:
 * Author: Jason<dcq@kuryun.cn>
 */

namespace Rebuild\Command;


use Rebuild\Server\ServerFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StartCommand extends Command
{
    /**
     * @var \Rebuild\Config\Config
     */
    protected $config;

    public function __construct(\Rebuild\Config\Config $config)
    {
        parent::__construct();
        $this->config = $config;
    }

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
        $config = $this->config;
        $configs = $config->get('server');
        $serverFactory = new ServerFactory();
        $serverFactory->configure($configs);
        $serverFactory->getServer()->start();
        return 1;
    }


}