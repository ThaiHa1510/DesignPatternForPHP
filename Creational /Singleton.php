<?php
class Singleton {
    protected static $instances=[];
    protected function __construct(){}
    protected function __clone(){}
    protected function __wakeup(){
        return new \Exception("Cannot unserialize singleton");
    }
    public static function getInstance(){
        $subClass = static::class ;
        if(!isset(self::$instances[$subClass])){
            self::$instances[$subClass] = new static ;
        }
        return self::$instances[$subClass];

    }
    
}
class ConsoleLog extends Singleton{
    protected function __construct(){
        echo "ok";
    }
    protected function writleLog($content){
        writeln("Write log in ");
        writeln($content);
    }
    public static function log($content){
        $log = static::getInstance();
        $log->writleLog($content);
    }
}
function writeln($line_in) {
    echo $line_in."<br/>";
}
writeln("begin test singleton design pattern");
echo "\n";
ConsoleLog::log("Console Log");