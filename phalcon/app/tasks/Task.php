<?php

namespace App\Tasks;

abstract class Task extends \Phalcon\Cli\Task
{
    public function onConstruct()
    {
        /**
         * Phalcon\Cli\Task constructor
         *
         * public final function __construct()
         * {
         *     if method_exists(this, "onConstruct") {
         *         this->{"onConstruct"}();
         *     }
         * }
         */
    }

    public function beforeExecuteRoute()
    {
        // 在每一个找到的动作前执行
    }

    public function afterExecuteRoute()
    {
        // 在每一个找到的动作后执行
    }
}

