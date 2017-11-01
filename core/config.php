<?php

class ConfigManager{
    public static function GetDbConfig(){
        $config = parse_ini_file(AppFolder."config/database.ini",true);
        return $config['database'];
    }
}

