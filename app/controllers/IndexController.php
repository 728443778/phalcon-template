<?php

namespace app\controllers;

use app\auth\PlatformAuth;
use app\common\libs\Application;
use app\logics\Common;
use app\logics\User;
use Phalcon\Exception;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->responseJson(ERROR_NONE, ['message' => 'welcome']);
    }
}

