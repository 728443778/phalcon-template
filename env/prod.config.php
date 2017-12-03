<?php

return new \Phalcon\Config([
    'project' => 'phalcon_template',
    'environment' => 'prod',     //dev,test,prod
    'debug' => false,
    'cryptSalt' => 'usdhaiuhkjagnkjasnkfklawuiahsoidjalkngkjwahdiuhawduhawdguagnndakwa',
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => '127.0.0.1',
        'username'    => 'root',
        'password'    => 'root',
        'dbname'      => 'test',
        'charset'     => 'utf8',
    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/controllers',
        'modelsDir'      => APP_PATH . '/models',
        'migrationsDir'  => APP_PATH . '/migrations',
        'viewsDir'       => APP_PATH . '/views',
        'pluginsDir'     => APP_PATH . '/plugins',
        'libraryDir'     => APP_PATH . '/library',
        'cacheDir'       => BASE_PATH . '/storage/cache',

        // This allows the baseUri to be understand project paths that are not in the root directory
        // of the webpspace.  This will break if the public/index.php entry point is moved or
        // possibly if the web server rewrite rules are changed. This can also be set to a static path.
        'baseUri'        => BASE_PATH,
    ],
    'logger' => [
        'path'     => BASE_PATH . '/storage/logs/',
        'format'   => '%date% [%type%] %message%',
        'date'     => 'H:i:s',
        'logLevel' => \Phalcon\Logger::ERROR,
    ],
    'debug_logger' => [
        'file'     => BASE_PATH . '/storage/logs/debug.log',
        'format'   => '[%type%] %message%',
        'date'     => 'Y-m-d H:i:s',
        'logLevel' => \Phalcon\Logger::SPECIAL,
    ],
    'redis' => [
        'cluster' =>false,
        'host' => '127.0.0.1',
        'password' => '',
        'username' => '',
        'port' => 6379,
        'index' => 6
    ],
    'resource_client' => [
        'class' => 'sevenUtils\resources\DevManager\Client',
        'construct_params' => ['9e9c5f2a', '37433293230b3953a9c7b1f298400875063ae19caccc7a98', 'http://192.168.0.178:12009'],
        'bucket' => 'icon',
        'endpoint' => 'http://127.0.0.1:12009'
    ],
    'mongodb' => [
        'host' => '127.0.0.1',
        'port' => '27017',
        'username' => '',
        'password' => '',
        'database' => 'test'
    ],
    'http_server' => [
        'host' => '0.0.0.0',
        'port' => '8888',
        'worker_num' => 8,
        'reactor_num' => 1,
        'daemon' => false,
        'log' => APP_PATH . '/http-server.log',
        'task_num' => 8,
        'worker_max_request' => 5000,
        'dispatch_mode' => 1
    ],
]);
