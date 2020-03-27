<?php
 class FurnitureFactory{

     protected function  __construct(){}
     static function getFactory($typeFactoy){
        if(is_numeric($typeFactoy)){
            switch($typeFactoy){
                case 1:
                    return new WoodFactory();
                break;
                case 2:
                    return new PlasticFactory();
                break;
                default:
                    return new WoodFactory();
                break;
            }
        }
        else{
            return NULL;
        }
     }
 }
 abstract class FurnitureAbsFactory{
    abstract public  function createChair();
     abstract public function createTable();

 }
 class WoodFactory extends FurnitureAbsFactory{
     public function createChair(){
         writeln("Create Wood Chair");
     }
     public function createTable(){
        writeln("Create Wood Table");
    }
 }
 class PlasticFactory extends FurnitureAbsFactory{
    public function createChair(){
        writeln("Create Plastic Chair");
    }
    public function createTable(){
       writeln("Create Plastic Table");
   }
}
function writeln($content){
    echo $content;
    echo "<br>";
}
echo "TEST ABSTRACT FACTORY ";
    $factory = FurnitureFactory::getFactory(1);
    $factory->createChair();
    echo "CREATE TABLE";
    $factory->createTable();