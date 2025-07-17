<?php
class ManufacturerApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["manufacturers"=>Manufacturer::all()]);
	}
	function pagination($data){
		$page=$data->page;
		$perpage=$data->perpage;
		echo json_encode(["manufacturers"=>Manufacturer::pagination($page,$perpage),"total_records"=>Manufacturer::count()]);
	}
	function search($data){
		echo json_encode(["manufacturers"=>Manufacturer::filter($data->name)]);
	}
	function find($data){
		echo json_encode(["manufacturer"=>Manufacturer::find($data->id)]);
	}
	function delete($data){
		Manufacturer::delete($data->id);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$manufacturer=new Manufacturer();
		$manufacturer->name=$data->name;

		$manufacturer->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$manufacturer=new Manufacturer();
		$manufacturer->id=$data->id;
		$manufacturer->name=$data->name;

		$manufacturer->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
