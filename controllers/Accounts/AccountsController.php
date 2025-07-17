<?php
 class AccountsController extends Controller{
   
   public function __construct(){
      $this->module="Accounts";
	}
    public function profit_loss(){
      $this->view();
    }

    public function equity(){
      $this->view();
    }

    public function financial_statement(){
      $this->view();
    }
    public function product_cost(){
      $this->view();
    }
 }
?>