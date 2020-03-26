<?php
interface AbsObserver {
    function update($content);
}
interface AbsSubject{
    function attach($book);
    function dettach($book);
    function notify($content);
}
class BookSubject implements AbsSubject{
   protected $ObserverList= Array();
   protected $title;
   protected $author;
   function __construct($title,$author){
       $this->setTitle($title);
       $this->setAuthor($author);
   }
    function setTitle($title){
       $this->title=$title;
       $this->notify("Thay doi title");
   }
   function setAuthor($author){
       $this->author=$author;
       $this->notify("Thay doi Author");
   }
   function attach($AbsObserver){
       $flag=true;
        foreach($this->ObserverList as $ket => $obs){
            if($AbsObserver == $obs){
                $flag=false;
            }
        }
        if($flag){
            $this->ObserverList[]=$AbsObserver;
            return $this->ObserverList;
        }
        else{
            return NULL;
        }
   }
   function dettach($AbsObserver){
    foreach($this->observers as $okey => $oval) {
        if ($oval == $observer_in) { 
          unset($this->observers[$okey]);
        }
    }
   }
   function notify($content){
      foreach( $this->ObserverList as $key => $obs){
          $obs->update($content);
      }
   }


}
function writeln($line_in) {
    echo $line_in."<br/>";
}
class Log implements AbsObserver{
    function update($content){
        writeln("Log update trong Observer");
        writeln($content);
        writeln("//// END \\\\\\\\\\");
    }
}
class Database implements AbsObserver{
    function update($content){
        writeln("Databse update trong Observer");
        writeln($content);
        writeln("//// END \\\\\\\\\\");
    }
}
writeln('BEGIN TESTING OBSERVER PATTERN');
writeln('');
$book=new BookSubject('Core PHP Programming, Third Edition', 'Atkinson and Suraski');
$log=new Log();
$database=new Database();
$book->attach($log);
$book->attach($database);
$book->setTitle('PHP Bible');
$book->setAuthor('Converse and Park');