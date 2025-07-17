<?php
class PurchaseController extends Controller{
	public function __construct(){
         $this->module="Purchase";
	}
	public function index(){
		$this->view();
	}
	public function create(){
		$this->view();
	}
}