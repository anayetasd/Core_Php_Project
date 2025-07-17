<?php
class ProductionCost extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $material_cost;
	public $production_cost;
	public $product_designs_id;

	public function __construct(){
	}
	public function set($id,$name,$material_cost,$production_cost,$product_designs_id){
		$this->id=$id;
		$this->name=$name;
		$this->material_cost=$material_cost;
		$this->production_cost=$production_cost;
		$this->product_designs_id=$product_designs_id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}production_costs(name,material_cost,production_cost,product_designs_id)values('$this->name','$this->material_cost','$this->production_cost','$this->product_designs_id')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}production_costs set name='$this->name',material_cost='$this->material_cost',production_cost='$this->production_cost',product_designs_id='$this->product_designs_id' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}production_costs where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,material_cost,production_cost,product_designs_id from {$tx}production_costs");
		$data=[];
		while($productioncost=$result->fetch_object()){
			$data[]=$productioncost;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,material_cost,production_cost,product_designs_id from {$tx}production_costs $criteria limit $top,$perpage");
		$data=[];
		while($productioncost=$result->fetch_object()){
			$data[]=$productioncost;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}production_costs $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,material_cost,production_cost,product_designs_id from {$tx}production_costs where id='$id'");
		$productioncost=$result->fetch_object();
			return $productioncost;
	}
	public static function filter($name){
		global $db,$tx;
		//Update field name after where keyword if don't have name field
		$result=$db->query("select id,name,material_cost,production_cost,product_designs_id from {$tx}production_costs where name like '%$name%'");
		$data=[];
		while($productioncost=$result->fetch_object()){
			$data[]=$productioncost;
		}
			return $data;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}production_costs");
		$productioncost =$result->fetch_object();
		return $productioncost->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Material Cost:$this->material_cost<br> 
		Production Cost:$this->production_cost<br> 
		Product Designs Id:$this->product_designs_id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProductionCost"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}production_costs");
		while($productioncost=$result->fetch_object()){
			$html.="<option value ='$productioncost->id'>$productioncost->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}production_costs $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,material_cost,production_cost,product_designs_id from {$tx}production_costs $criteria limit $top,$perpage");
		$html="<table class='table'>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Material Cost</th><th>Production Cost</th><th>Product Designs Id</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Material Cost</th><th>Production Cost</th><th>Product Designs Id</th></tr>";
		}
		while($productioncost=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"productioncost/show/$productioncost->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"productioncost/edit/$productioncost->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"productioncost/confirm/$productioncost->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$productioncost->id</td><td>$productioncost->name</td><td>$productioncost->material_cost</td><td>$productioncost->production_cost</td><td>$productioncost->product_designs_id</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,material_cost,production_cost,product_designs_id from {$tx}production_costs where id={$id}");
		$productioncost=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">ProductionCost Show</th></tr>";
		$html.="<tr><th>Id</th><td>$productioncost->id</td></tr>";
		$html.="<tr><th>Name</th><td>$productioncost->name</td></tr>";
		$html.="<tr><th>Material Cost</th><td>$productioncost->material_cost</td></tr>";
		$html.="<tr><th>Production Cost</th><td>$productioncost->production_cost</td></tr>";
		$html.="<tr><th>Product Designs Id</th><td>$productioncost->product_designs_id</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
