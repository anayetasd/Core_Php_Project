<?php
class RawMaterial extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $color;
	public $quantity;
	public $unit;
	public $price;

	public function __construct(){
	}
	public function set($id,$name,$color,$quantity,$unit,$price){
		$this->id=$id;
		$this->name=$name;
		$this->color=$color;
		$this->quantity=$quantity;
		$this->unit=$unit;
		$this->price=$price;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}raw_materials(name,color,quantity,unit,price)values('$this->name','$this->color','$this->quantity','$this->unit','$this->price')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}raw_materials set name='$this->name',color='$this->color',quantity='$this->quantity',unit='$this->unit',price='$this->price' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}raw_materials where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,color,quantity,unit,price from {$tx}raw_materials");
		$data=[];
		while($rawmaterial=$result->fetch_object()){
			$data[]=$rawmaterial;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,color,quantity,unit,price from {$tx}raw_materials $criteria limit $top,$perpage");
		$data=[];
		while($rawmaterial=$result->fetch_object()){
			$data[]=$rawmaterial;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}raw_materials $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,color,quantity,unit,price from {$tx}raw_materials where id='$id'");
		$rawmaterial=$result->fetch_object();
			return $rawmaterial;
	}
	public static function filter($name){
		global $db,$tx;
		//Update field name after where keyword if don't have name field
		$result=$db->query("select id,name,color,quantity,unit,price from {$tx}raw_materials where name like '%$name%'");
		$data=[];
		while($rawmaterial=$result->fetch_object()){
			$data[]=$rawmaterial;
		}
			return $data;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}raw_materials");
		$rawmaterial =$result->fetch_object();
		return $rawmaterial->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Color:$this->color<br> 
		Quantity:$this->quantity<br> 
		Unit:$this->unit<br> 
		Price:$this->price<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbRawMaterial"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}raw_materials");
		while($rawmaterial=$result->fetch_object()){
			$html.="<option value ='$rawmaterial->id'>$rawmaterial->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}raw_materials $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,color,quantity,unit,price from {$tx}raw_materials $criteria limit $top,$perpage");
		$html="<table class='table'>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Color</th><th>Quantity</th><th>Unit</th><th>Price</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Color</th><th>Quantity</th><th>Unit</th><th>Price</th></tr>";
		}
		while($rawmaterial=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"rawmaterial/show/$rawmaterial->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"rawmaterial/edit/$rawmaterial->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"rawmaterial/confirm/$rawmaterial->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$rawmaterial->id</td><td>$rawmaterial->name</td><td>$rawmaterial->color</td><td>$rawmaterial->quantity</td><td>$rawmaterial->unit</td><td>$rawmaterial->price</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,color,quantity,unit,price from {$tx}raw_materials where id={$id}");
		$rawmaterial=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">RawMaterial Show</th></tr>";
		$html.="<tr><th>Id</th><td>$rawmaterial->id</td></tr>";
		$html.="<tr><th>Name</th><td>$rawmaterial->name</td></tr>";
		$html.="<tr><th>Color</th><td>$rawmaterial->color</td></tr>";
		$html.="<tr><th>Quantity</th><td>$rawmaterial->quantity</td></tr>";
		$html.="<tr><th>Unit</th><td>$rawmaterial->unit</td></tr>";
		$html.="<tr><th>Price</th><td>$rawmaterial->price</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
