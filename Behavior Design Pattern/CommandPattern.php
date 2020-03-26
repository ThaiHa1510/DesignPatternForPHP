<?php
class Editor{
    public $open;
    public $close;
    function __construct(CommanDocument $open,CommanDocument $close){
        $this->open=$open;
        $this->close=$close;
    }
    public function openDocuemnt(){
       $this->open->excute();
       //var_dump($this->open);
    }
    public function closeDocuemnt(){
        $this->close->excute();
    }
}

abstract class CommanDocument{
    protected $document;
    function __construct($document_in){
        $this->document =$document_in;
        
    }
    abstract function  excute();
}
class OpenDocument extends CommanDocument  {
    
    public function excute(){
        $this->document->openDocuemnt();
     //  var_dump($document);
    }
}
class CloseDocument extends CommanDocument{
    public function excute(){
        $this->document->closeDocuemnt();
      //var_dump($document);
    }
}
class Document {
    protected $title;
    protected $author;
    protected $status;
    public function  __construct($title_in, $author_in) {
        
       $this->setAuthor($author_in);
        $this->setTittle($title_in);
    }
    public function setTittle($title_id){
        $this->title=$title_id;
    }
    public function getTittle(){
        return $this->title;
    }
    public function setAuthor($author_id){
        $this->author=$author_id;
    }
    public function openDocuemnt(){
        echo "Docuemnt Open \n";
    }
    public function closeDocuemnt(){
        echo "Docuemnt Closed \n";
    }
}

$document=new Document('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');

$openDocument=new OpenDocument($document);
$closeDocument=new CloseDocument($document);
$editor =new Editor($openDocument,$closeDocument);
$editor->closeDocuemnt();
//$a=$document->getTittle();
//echo $a;
//echo "FFFFFFFF";
//var_dump($document->title);
//$openDocument->openDocuemnt();