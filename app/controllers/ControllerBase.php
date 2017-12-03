<?php

namespace app\controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected function responseJson($code, $data)
    {
        $data['code'] = $code;
        $data['request_id'] = \app\common\libs\Application::$app->getRequestId();
        return $this->response->setJsonContent($data);
    }
}
