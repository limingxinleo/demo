<?php

namespace App\Controllers\Test;

use App\Traits\System\Response;

class Controller extends \App\Controllers\Controller
{
    use Response;
    protected $settings = [];

    protected $host;

    public function initialize()
    {
        $this->settings = [
            "mySetting" => "value",
        ];
        if (strtolower($this->getName()) == strtolower('App-Controllers-Test-index-qx2')) {
            if ($this->request->isPost()) {
                return $this->dispatcher->forward([
                    'namespace' => 'App\\Controllers',
                    'controller' => 'error',
                    'action' => 'json',
                    'params' => [500, "测试错误"],
                ]);
            } else {
                return dispatch_error(500, "测试错误！");
            }
        }

    }

    public function getName()
    {
        $namespace = $this->router->getNamespaceName();
        $controller = $this->router->getControllerName();
        $action = $this->router->getActionName();

        $name = str_replace('\\', '-', $namespace);
        $name .= '-' . str_replace('\\', '-', $controller);
        $name .= '-' . str_replace('\\', '-', $action);

        return $name;
    }

    public function beforeExecuteRoute()
    {
        parent::beforeExecuteRoute(); // TODO: Change the autogenerated stub
        $this->host = $this->request->getHeader('Origin');
    }

    public function afterExecuteRoute()
    {
        // 匹配不同的host
        $this->response->setHeader('Access-Control-Allow-Origin', $this->host);
        parent::afterExecuteRoute(); // TODO: Change the autogenerated stub
    }
}
