<?php
// +----------------------------------------------------------------------
// | 菜单 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lmx0536.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <http://www.lmx0536.cn>
// +----------------------------------------------------------------------
// | Date: 2017/3/6 Time: 上午8:13
// +----------------------------------------------------------------------
namespace MyApp\Tasks\Test;

use Phalcon\Cli\Task;
use limx\phalcon\Cli\Color;

class MatchTask extends Task
{
    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  测试脚本列表') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run Test\\\\Match [Action]', Color::FG_GREEN) . PHP_EOL . PHP_EOL;
        echo Color::head('Action:') . PHP_EOL;
        echo Color::colorize('  match                       正则表达式测试', Color::FG_GREEN) . PHP_EOL;
    }

    public function matchAction()
    {
        $vals = ["qianrong.gold30", "qianrong.coin30"];
        echo Color::head("正则表达式：") . PHP_EOL;
        foreach ($vals as $val) {
            echo Color::colorize("  " . $val) . PHP_EOL;
            preg_match("/(coin|gold)[0-9]+$/", $val, $res);
            echo Color::colorize("  " . json_encode($res)) . PHP_EOL;
        }
    }

}