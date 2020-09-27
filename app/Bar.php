<?php
/**
 * Created by PhpStorm.
 * Script Name: Bar.php
 * Create: 8:30 下午
 * Description:
 * Author: Jason<dcq@kuryun.cn>
 */

namespace App;


class Bar
{
    public function bar() {
        $foo = new Foo();
        echo $foo->foo();
    }
}