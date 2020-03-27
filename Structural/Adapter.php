<?php 
interface VietNameLanguage {
    function send($msg);
}
class TranslatorAdapter implements VietNameLanguage{
    protected $JapanPeople = array();
    function setPeople(JapanPeople $Jpeople){
        $this->JapanPeople[]=$Jpeople;
    }
    function send($msg){     
        foreach($this->JapanPeople as $key =>$people){
            echo "run writeln";
            $people->reviced($msg);
        }
       
    }

}
class JapanPeople {
    protected $name;
    protected $gender;
    function reviced($msg){
        
        writeln( $this->name ." reviced message ");
    }
    function __construct($name,$gender){
        $this->name=$name;
        $this->gender=$gender;
    }
}
function client(VietNameLanguage $ts){
    $jk=new JapanPeople("hisdo haski ", "male");
    $jo=new JapanPeople("naku djenko ","female");
    $ts->setPeople($jk) ;
    $ts->setPeople($jo);
    $ts->send("translate i love vietname");
}
function writeln($content){
    echo $content;
    echo "<br>";
}
writeln("BEGIN TO TEST ADAPTER DESIGN PATTER");
$adapter=new TranslatorAdapter();
client($adapter);