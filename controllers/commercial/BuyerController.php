<?php
class BuyerController extends Controller{
	public function __construct(){
		$this->module="commercial";
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!is_valid_email($data->email)){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$data->phoneNumber)){
		$errors["phoneNumber"]="Invalid phoneNumber";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtAddress"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPaymentmethod"])){
		$errors["paymentMethod"]="Invalid paymentMethod";
	}
	if(!preg_match("/^[\s\S]+$/",$data->amount)){
		$errors["amount"]="Invalid amount";
	}

*/
		if(count($errors)==0){
			$buyer=new Buyer();
		$buyer->name=$data->name;
		$buyer->email=$data->email;
		$buyer->phoneNumber=$data->phoneNumber;
		$buyer->address=$data->address;
		$buyer->paymentMethod=$data->paymentMethod;
		$buyer->amount=$data->amount;

			$buyer->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		$this->view(Buyer::find($id));
}
public function update($data,$file){
	global $now;
	if(isset($data->update)){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!is_valid_email($data->email)){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$data->phoneNumber)){
		$errors["phoneNumber"]="Invalid phoneNumber";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtAddress"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPaymentmethod"])){
		$errors["paymentMethod"]="Invalid paymentMethod";
	}
	if(!preg_match("/^[\s\S]+$/",$data->amount)){
		$errors["amount"]="Invalid amount";
	}

*/
		if(count($errors)==0){
			$buyer=new Buyer();
			$buyer->id=$data->id;
		$buyer->name=$data->name;
		$buyer->email=$data->email;
		$buyer->phoneNumber=$data->phoneNumber;
		$buyer->address=$data->address;
		$buyer->paymentMethod=$data->paymentMethod;
		$buyer->amount=$data->amount;

		$buyer->update();
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
		Buyer::delete($id);
		redirect();
	}
	public function show($id){
		$this->view(Buyer::find($id));
	}
}
?>
