<?php
class ProductDesignController extends Controller{
	public function __construct(){
		$this->module="merchandising";
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtSize"])){
		$errors["size"]="Invalid size";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtColor"])){
		$errors["color"]="Invalid color";
	}

*/
		if(count($errors)==0){
			$productdesign=new ProductDesign();
		$productdesign->name=$data->name;
		$productdesign->size=$data->size;
		$productdesign->color=$data->color;

			$productdesign->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		$this->view(ProductDesign::find($id));
}
public function update($data,$file){
	global $now;
	if(isset($data->update)){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtSize"])){
		$errors["size"]="Invalid size";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtColor"])){
		$errors["color"]="Invalid color";
	}

*/
		if(count($errors)==0){
			$productdesign=new ProductDesign();
			$productdesign->id=$data->id;
		$productdesign->name=$data->name;
		$productdesign->size=$data->size;
		$productdesign->color=$data->color;

		$productdesign->update();
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
		ProductDesign::delete($id);
		redirect();
	}
	public function show($id){
		$this->view(ProductDesign::find($id));
	}
}
?>
