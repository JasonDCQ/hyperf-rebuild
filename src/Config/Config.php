<?php
/**
 * Created by PhpStorm.
 * Script Name: Config.php
 * Create: 9:03 下午
 * Description:
 * Author: Jason<dcq@kuryun.cn>
 */

namespace Rebuild\Config;

use Rebuild\Contract\ConfigInterface;

class Config implements ConfigInterface
{
    /**
     * @var array
     */
    protected $configs = [];

    public function __construct(array $configs)
    {
        $this->configs = $configs;
    }

    /**
     * @inheritDoc
     */
    public function get(string $key, $default = null)
    {
        // TODO: Implement get() method.
        return $this->configs[$key] ?? $default;
    }

    /**
     * @inheritDoc
     */
    public function has(string $keys)
    {
        // TODO: Implement has() method.
        return isset($this->configs[$keys]);
    }

    /**
     * @inheritDoc
     */
    public function set(string $key, $value)
    {
        // TODO: Implement set() method.
        $this->configs[$keys] = $value;
    }
}