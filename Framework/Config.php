<?php
namespace Framework;
require_once './core/init.php';

class Config {

    public static function getConfig($path = null) {
        if ($path) {
            $config = $GLOBALS['config'];
            $path = explode('/', $path);
            foreach ($path as $value) {
                if (isset($config[$value])) {
                    $config = $config[$value];
                }
            }
            return $config;
        }
        return false;
    }

}
