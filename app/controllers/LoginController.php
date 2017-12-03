<?php

namespace app\controllers;

use app\common\libs\Application;
use Phalcon\Mvc\Dispatcher;

class LoginController extends ControllerBase
{
    /**
     *
     * @param $dispatcher Dispatcher
     */
    public function beforeExecuteRoute($dispatcher)
    {
        $token = $this->request->getPost('token');
        if (empty($token) || !Application::$app->user->initUser($token)) {
            $data = [
                'code' => ERROR_USER_NOT_LOGIN
            ];
            $this->response->setJsonContent($data);
            return false;
        }
        return true;
    }

    public function indexAction()
    {
        return 'aaaa';
    }
}