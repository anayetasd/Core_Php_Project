<?php
class FinishedGoodController extends Controller{
	public function __construct(){
		$this->module="Inventory";
	}
	public function index(){
		$this->view();
	}
	public function create(){
		$this->view();
	}
public function save($data,$file){
	global $now;
	if(isset($data->create)){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtProductCode"])){
		$errors["product_code"]="Invalid product_code";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtProductName"])){
		$errors["product_name"]="Invalid product_name";
	}
	if(!preg_match("/^[\s\S]+$/",$data->quantity)){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data->price)){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtFinishedGoodStatus"])){
		$errors["finished_good_status"]="Invalid finished_good_status";
	}
	if(!preg_match("/^[\s\S]+$/",$data->batch_number)){
		$errors["batch_number"]="Invalid batch_number";
	}

*/
		if(count($errors)==0){
			$finishedgood=new FinishedGood();
		$finishedgood->product_code=$data->product_code;
		$finishedgood->product_name=$data->product_name;
		$finishedgood->quantity=$data->quantity;
		$finishedgood->price=$data->price;
		$finishedgood->order_date=date("Y-m-d",strtotime($data->order_date));
		$finishedgood->finished_good_status=$data->finished_good_status;
		$finishedgood->batch_number=$data->batch_number;

			$finishedgood->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		$this->view(FinishedGood::find($id));
}
public function update($data,$file){
	global $now;
	if(isset($data->update)){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtProductCode"])){
		$errors["product_code"]="Invalid product_code";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtProductName"])){
		$errors["product_name"]="Invalid product_name";
	}
	if(!preg_match("/^[\s\S]+$/",$data->quantity)){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data->price)){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtFinishedGoodStatus"])){
		$errors["finished_good_status"]="Invalid finished_good_status";
	}
	if(!preg_match("/^[\s\S]+$/",$data->batch_number)){
		$errors["batch_number"]="Invalid batch_number";
	}

*/
		if(count($errors)==0){
			$finishedgood=new FinishedGood();
			$finishedgood->id=$data->id;
		$finishedgood->product_code=$data->product_code;
		$finishedgood->product_name=$data->product_name;
		$finishedgood->quantity=$data->quantity;
		$finishedgood->price=$data->price;
		$finishedgood->order_date=date("Y-m-d",strtotime($data->order_date));
		$finishedgood->finished_good_status=$data->finished_good_status;
		$finishedgood->batch_number=$data->batch_number;

		$finishedgood->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		$this->view();
	}
	public function delete($id){
		FinishedGood::delete($id);
		redirect();
	}
	public function show($id){
		$this->view(FinishedGood::find($id));
	}
}
?>
