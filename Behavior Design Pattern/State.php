<?php

inteface State{
  public function proceedToNext();
  public function toString();
}

class StateOrderDone implements State{
  public $context;
  
  public __contruct(OrderContext $context){
    $this->context = $context;
  }
  public function proceedToNext(){
    $context->setState(null);
  }
  public toString(){
    retur 'Done';
  }
}

class StateOrderCreated implements State{
   public __contruct(OrderContext $context){
    $this->context = $context;
   }
    public function proceedToNext(){
      echo $this->toString();
      $stateShip = new StateOrderShip($this->context);
    }
    public toString(){
      retur 'Done';
    }
}
class StateOrderShip implements State{
   public __contruct(OrderContext $context){
    $this->context = $context;
   }
    public function proceedToNext(){
      echo $this->toString();
      $stateShip = new StateOrderDone($this->context);
    }
    public toString(){
      retur 'Done';
    }
}
class OrderContext{
  public State $state;
  public static create(){
     $order = new self();
      $order->state = new StateCreated();

      return $order;
  }
  public function proceedToNext(){
     $this->state->proceedToNext();
    }
    public toString(){
       $this->state->toString();
    }
}
