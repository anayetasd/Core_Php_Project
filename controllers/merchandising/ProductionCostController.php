<?php
class ProductionCostController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtMaterialCost"])){
		$errors["material_cost"]="Invalid material_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtProductionCost"])){
		$errors["production_cost"]="Invalid production_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$data->product_designs_id)){
		$errors["product_designs_id"]="Invalid product_designs_id";
	}

*/
		if(count($errors)==0){
			$productioncost=new ProductionCost();
		$productioncost->name=$data->name;
		$productioncost->material_cost=$data->material_cost;
		$productioncost->production_cost=$data->production_cost;
		$productioncost->product_designs_id=$data->product_designs_id;

			$productioncost->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		$this->view(ProductionCost::find($id));
}
public function update($data,$file){
	global $now;
	if(isset($data->update)){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtMaterialCost"])){
		$errors["material_cost"]="Invalid material_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtProductionCost"])){
		$errors["production_cost"]="Invalid production_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$data->product_designs_id)){
		$errors["product_designs_id"]="Invalid product_designs_id";
	}

*/
		if(count($errors)==0){
			$productioncost=new ProductionCost();
			$productioncost->id=$data->id;
		$productioncost->name=$data->name;
		$productioncost->material_cost=$data->material_cost;
		$productioncost->production_cost=$data->production_cost;
		$productioncost->product_designs_id=$data->product_designs_id;

		$productioncost->update();
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
		ProductionCost::delete($id);
		redirect();
	}
	public function show($id){
		$this->view(ProductionCost::find($id));
	}
}
?>
