<?php

    interface State
    {
      public function proceedToNext();
      public function toString();
    }

    class StateOrderDone implements State
    {
      public $context;

      public function  __construct(OrderContext $context)
      {
        $this->context = $context;
      }
      public function proceedToNext()
      {
        // $this->context->setState(null);
      }
      public function toString()
      {
        return  'Done';
      }
    }

    class StateOrderCreated implements State
    {
      public function  __construct(OrderContext $context)
      {
        $this->context = $context;
      }
      public function proceedToNext()
      {
        echo $this->toString();
        $stateShip = new StateOrderShip($this->context);
      }
      public function toString()
      {
        return  'Done';
      }
    }
    class StateOrderShip implements State
    {
      public function  __contruct(OrderContext $context)
      {
        $this->context = $context;
      }
      public function proceedToNext()
      {
        echo $this->toString();
        $stateShip = new StateOrderDone($this->context);
      }
      public function  toString()
      {
        return  'Done';
      }
    }
    class OrderContext
    {
      public State $state;
      public static function create()
      {
        $order = new self();
        //$order->state = new StateOrderCreated();
        return $order;
      }
      public function proceedToNext()
      {
        $this->state->proceedToNext();
      }
      public function  toString()
      {
        $this->state->toString();
      }
    }
