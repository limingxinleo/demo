<?php
// +----------------------------------------------------------------------
// | 测试脚本 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Tasks\Test;

use App\Logics\TestPimple\ConfigServiceProvider;
use App\Logics\TestPimple\TestServiceProvider;
use limx\phalcon\Cli\Color;
use Phalcon\Cli\Task;
use Pimple\Container;

class TestTask extends Task
{
    public function mainAction()
    {
        echo Color::head('Help:'), PHP_EOL;
        echo Color::colorize('  测试脚本'), PHP_EOL, PHP_EOL;

        echo Color::head('Usage:'), PHP_EOL;
        echo Color::colorize('  php run Test\\\\Test [action]', Color::FG_GREEN), PHP_EOL, PHP_EOL;

        echo Color::head('Actions:'), PHP_EOL;
        echo Color::colorize('  sleep       延时脚本', Color::FG_GREEN), PHP_EOL;
        echo Color::colorize('  switch      switch测试', Color::FG_GREEN), PHP_EOL;
        echo Color::colorize('  pimple      pimple测试', Color::FG_GREEN), PHP_EOL;
        echo Color::colorize('  callfunc    测试匿名函数传值', Color::FG_GREEN), PHP_EOL;
        echo Color::colorize('  incubator   测试incubator是否可以与phalcon扩展共用', Color::FG_GREEN), PHP_EOL;
        echo Color::colorize('  date        YmdHis', Color::FG_GREEN), PHP_EOL;

    }

    public function dateAction()
    {
        echo date("YmdHis") . round(microtime() * 1000), PHP_EOL;
    }

    public function incubatorAction()
    {
        // 文件地址都在vendor/phalcon/incubator/Library

        // 增加Phalcon\Config.php 文件
        /**
         *  namespace Phalcon;
         *  class Config
         *  {
         *      public function __construct()
         *      {
         *          echo "Phalcon\\Config" . PHP_EOL;
         *      }
         *  }
         */

        // 增加Phalcon\ConfigTest.php 文件
        /**
         *  namespace Phalcon;
         *  class ConfigTest
         *  {
         *      public function __construct()
         *      {
         *          echo "Phalcon\\ConfigTest" . PHP_EOL;
         *      }
         *  }
         */

        $db = new \Phalcon\Config();
        $db = new \Phalcon\ConfigTest();
    }

    public function callfuncAction()
    {
        $res = function ($value) {
            return $value;
        };
        print_r($res('Hello World!'));
    }

    public function pimpleAction()
    {
        $pimple = new Container();
        $pimple->register(new ConfigServiceProvider());
        $pimple->register(new TestServiceProvider());
        print_r($pimple['test']);
        sleep(1);
        print_r($pimple['test']);
    }

    public function switchAction($params = [])
    {
        $case = 0;
        if (count($params) > 0) {
            $case = $params[0];
        }

        switch (true) {
            case $case == 0:
                $msg = "case=0";
                break;
            case $case == 1:
                $msg = "case=1";
                break;
            case $case == 2:
                $msg = "case=2";
                break;
            case $case == 3:
                $msg = "case=3";
                break;
            default:
                $msg = "case not in (0,1,2,3)";
                break;
        }

        echo Color::colorize($msg, Color::FG_GREEN);
    }


    public function sleepAction($params)
    {
        $time = 5;
        if (count($params) > 0) {
            $time = intval($params[0]);
        }
        logger("延时操作BEGIN");
        sleep($time);
        logger("延时操作END");
    }
}