<?php
class ProductDesign extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $size;
	public $color;

	public function __construct(){
	}
	public function set($id,$name,$size,$color){
		$this->id=$id;
		$this->name=$name;
		$this->size=$size;
		$this->color=$color;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}product_designs(name,size,color)values('$this->name','$this->size','$this->color')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}product_designs set name='$this->name',size='$this->size',color='$this->color' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}product_designs where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,size,color from {$tx}product_designs");
		$data=[];
		while($productdesign=$result->fetch_object()){
			$data[]=$productdesign;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,size,color from {$tx}product_designs $criteria limit $top,$perpage");
		$data=[];
		while($productdesign=$result->fetch_object()){
			$data[]=$productdesign;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}product_designs $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,size,color from {$tx}product_designs where id='$id'");
		$productdesign=$result->fetch_object();
			return $productdesign;
	}
	public static function filter($name){
		global $db,$tx;
		//Update field name after where keyword if don't have name field
		$result=$db->query("select id,name,size,color from {$tx}product_designs where name like '%$name%'");
		$data=[];
		while($productdesign=$result->fetch_object()){
			$data[]=$productdesign;
		}
			return $data;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}product_designs");
		$productdesign =$result->fetch_object();
		return $productdesign->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Size:$this->size<br> 
		Color:$this->color<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProductDesign"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}product_designs");
		while($productdesign=$result->fetch_object()){
			$html.="<option value ='$productdesign->id'>$productdesign->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}product_designs $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,size,color from {$tx}product_designs $criteria limit $top,$perpage");
		$html="<table class='table'>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Size</th><th>Color</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Size</th><th>Color</th></tr>";
		}
		while($productdesign=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"productdesign/show/$productdesign->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"productdesign/edit/$productdesign->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"productdesign/confirm/$productdesign->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$productdesign->id</td><td>$productdesign->name</td><td>$productdesign->size</td><td>$productdesign->color</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,size,color from {$tx}product_designs where id={$id}");
		$productdesign=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">ProductDesign Show</th></tr>";
		$html.="<tr><th>Id</th><td>$productdesign->id</td></tr>";
		$html.="<tr><th>Name</th><td>$productdesign->name</td></tr>";
		$html.="<tr><th>Size</th><td>$productdesign->size</td></tr>";
		$html.="<tr><th>Color</th><td>$productdesign->color</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
