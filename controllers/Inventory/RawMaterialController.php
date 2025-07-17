<?php
class RawMaterialController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtColor"])){
		$errors["color"]="Invalid color";
	}
	if(!preg_match("/^[\s\S]+$/",$data->quantity)){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data->unit)){
		$errors["unit"]="Invalid unit";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPrice"])){
		$errors["price"]="Invalid price";
	}

*/
		if(count($errors)==0){
			$rawmaterial=new RawMaterial();
		$rawmaterial->name=$data->name;
		$rawmaterial->color=$data->color;
		$rawmaterial->quantity=$data->quantity;
		$rawmaterial->unit=$data->unit;
		$rawmaterial->price=$data->price;

			$rawmaterial->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		$this->view(RawMaterial::find($id));
}
public function update($data,$file){
	global $now;
	if(isset($data->update)){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtColor"])){
		$errors["color"]="Invalid color";
	}
	if(!preg_match("/^[\s\S]+$/",$data->quantity)){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data->unit)){
		$errors["unit"]="Invalid unit";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPrice"])){
		$errors["price"]="Invalid price";
	}

*/
		if(count($errors)==0){
			$rawmaterial=new RawMaterial();
			$rawmaterial->id=$data->id;
		$rawmaterial->name=$data->name;
		$rawmaterial->color=$data->color;
		$rawmaterial->quantity=$data->quantity;
		$rawmaterial->unit=$data->unit;
		$rawmaterial->price=$data->price;

		$rawmaterial->update();
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
		RawMaterial::delete($id);
		redirect();
	}
	public function show($id){
		$this->view(RawMaterial::find($id));
	}
}
?>
