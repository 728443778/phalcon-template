<?php

namespace app\controllers;

use app\logics\User;

class UserController extends LoginController
{

    /**
     * @param token
     * @return \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
     * @errorCode ERROR_NONE|ERROR_INVALID_PARAM
     */
    public function logoutAction()
    {
        $token = $this->request->getPost('token');
        if (!User::logout($token)) {
            return $this->responseJson(User::$errorCode,[]);
        }
        return $this->responseJson(ERROR_NONE, []);
    }

}

