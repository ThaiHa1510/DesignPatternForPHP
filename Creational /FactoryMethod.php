<?php
interface SocialNetWork{
    function getSocialNetWorkConnector():SocialNetWorkConnector;
    function __construct($user,$password);
    function post($content);



}
class FacebookSocialNetWork implements SocialNetWork{
    protected $user_name;
    protected $password;
    function __construct($user,$password){
        $this->user_name=$user;
        $this->password=$password;
    }
    function getSocialNetWorkConnector() :SocialNetWorkConnector {
        return new FacebookSocialNetWorkConnector($this->user_name,$this->password);

    }
    function post($content){
        $connector=$this->getSocialNetWorkConnector();
        $connector->login();
        $connector->post($content);
        $connector->logout();
    }
}
class ZaloSocialNetWork implements SocialNetWork{
    protected $user_name;
    protected $password;
    function __construct($user,$password){
        $this->user_name=$user;
        $this->password=$password;
    }
    function getSocialNetWorkConnector() :SocialNetWorkConnector{
        return new ZaloSocialNetWorkConnector($this->user_name,$this->password);

    }
    function post($content){
        $connector=$this->getSocialNetWorkConnector();
        $connector->login();
        $connector->post($content);
        $connector->logout();
    }
}
interface SocialNetWorkConnector{
    function login();
    function __construct($user,$password);
    function logout();
    function post($content);
}
class FacebookSocialNetWorkConnector implements SocialNetWorkConnector{
    protected $user_name;
    protected $password;
    function login(){
        writeln("Login in Facebook with name " . $this->user_name." passowrd=***" );
    }
    function logout(){
        writeln("logout in Facebook with name ".$this->user_name);
    }
    function post($content){
        writeln("post ".$content." in Facebook");
    }
    function __construct($user,$password){
        $this->user_name=$user;
        $this->password=$password;
    }

}
class ZaloSocialNetWorkConnector implements SocialNetWorkConnector{
    protected $user_name;
    protected $password;
    function login(){
        writeln("Login in zalo with name ".$this->user_name." passowrd=***" );
    }
    function logout(){
        writeln("logout in Facebook with name ".$this->user_name);
    }
    function post($content){
        writeln("post " . $content . " in Zalo");
    }
    function __construct($user,$password){
        $this->user_name=$user;
        $this->password=$password;
    }
    
}
function writeln($content){
    echo $content;
    echo "<br>";
}
function clientCode(SocialNetWork $creator)
{
    // ...
    $creator->post("Hello world!");
    $creator->post("I had a large hamburger this morning!");
    // ...
}


echo "Testing ConcreteCreator1:\n";
clientCode(new ZaloSocialNetWork("john_smith", "******"));
echo "\n\n";

echo "Testing ConcreteCreator2:\n";
clientCode(new FacebookSocialNetWork("john_smith@example.com", "******"));