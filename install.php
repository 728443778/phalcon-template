<?php

//创建目录
umask(0);
$dir = dirname(__FILE__);
$log = $dir . '/storage/logs';
$metaDataCache = $dir . '/storage/cache/metaData';
$viewsCache = $dir . '/storage/cache/viewsCache';
$modelsCache = $dir .'/storage/cache/modelsCache';

if (is_dir($log)) {
    echo $log, ' exists,skip',PHP_EOL;
    chmod($log, 0777);
} else {
    if (!mkdir($log, 0777, true)) {
        echo 'create dir failed:',$log,PHP_EOL;
        exit(-1);
    }
    echo 'create ', $log,PHP_EOL;
}

if (is_dir($metaDataCache)) {
    echo $metaDataCache, ' exists,skip',PHP_EOL;
    chmod($metaDataCache, 0777);
} else {
    if (!mkdir($metaDataCache, 0777, true)) {
        echo 'create dir failed:',$metaDataCache,PHP_EOL;
        exit(-1);
    }
    echo 'create ' , $metaDataCache,PHP_EOL;
}

if (is_dir($viewsCache)) {
    echo $viewsCache,'exists,skip',PHP_EOL;
    chmod($viewsCache, 0777);
} else {
    if (!mkdir($viewsCache, 0777, true)) {
        echo 'create dir failed:',$viewsCache,PHP_EOL;
        exit(-1);
    }
    echo 'create ', $viewsCache,PHP_EOL;
}

if (is_dir($modelsCache)) {
    echo $modelsCache,'exists,skip',PHP_EOL;
    chmod($modelsCache, 0777);
} else {
    if (!mkdir($modelsCache, 0777, true)) {
        echo 'create dir failed:',$modelsCache,PHP_EOL;
        exit(-1);
    }
    echo 'create ', $modelsCache,PHP_EOL;
}

$configFile = $dir . '/app/config/config.php';
if (is_file($configFile)) {
    exit(0);
}
//复制配置文件
if (!copy($dir . '/env/dev.config.php', $dir . '/app/config/config.php')) {
    exit('copy develop config file failed');
} else {
    echo 'copy develop config file success',PHP_EOL;
}
exit(0);