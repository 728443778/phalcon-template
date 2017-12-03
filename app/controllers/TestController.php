<?php

namespace app\controllers;

use app\common\libs\Application;
use Phalcon\Mvc\Controller;
use sevenUtils\resources\DevManager\Utils;

class TestController extends Controller
{
    public function uploadAction()
    {
        $resourceClient = Application::getApp()->getResourceClient();
        $url = $resourceClient->signUrl('a9bc215d9fb2556caa03.jpg');
        return $this->response->setContent($url);
        $request = $this->request;
        $files = $request->getUploadedFiles();
        if (count($files) != 1) {
            exit(ERROR_UPLOAD_FILE_NUMBER_ERROR);
        }
        $file = $files[0];
        if ($file->getError() !== 0) {
            exit($file->getError());
        }
        $realType = $file->getRealType(); //这个函数获取的事真实的类型，包含了 mime信息的
        $type = explode('/', $realType);
        if (!isset($type[1])) {
            exit(ERROR_UPLOAD_FILE_FAILED);
        }
        if (!in_array($type[1], ['jpeg', 'jpg', 'png'])) {
            exit(ERROR_UPLOAD_FILE_TYPE_ERROR);
        }
        if ($file->getSize() > 2097152) {
            exit(ERROR_UPLOAD_FILE_SIZE_ERROR);
        }
        $object = Application::getApp()->genRandomString(10) . '.jpg';
        $resourceClient = Application::getApp()->getResourceClient();
        $flag = $resourceClient->createBucket('icon');
        if (!$flag) {
            echo $resourceClient->getErrorMessage();
        }
        if (!$resourceClient->uploadFile($object, $file->getTempName())) {
            echo Utils::getErrorStrByErrorCode($resourceClient->getErrorMessage());
            exit(ERROR_UPLOAD_FILE_FAILED);
        }
        exit(ERROR_NONE);
    }
}